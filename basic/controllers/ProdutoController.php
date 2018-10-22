<?php

namespace app\controllers;

use app\models\Cliente;
use app\models\Venda;
use Yii;
use app\models\Produto;
use app\models\search\ProdutoSearch;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Produto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProdutoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produto model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Produto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Salvando o valor total do produto
            $v_un = $model->getAttribute('valor_un');
            $qtd = $model->getAttribute('quantidade');
            $v_tot = $v_un * $qtd;
            $model->setAttribute('valor_tot', $v_tot);
            $model->save();

            //Upload da imagem do produto
            if ($model->imageFile = UploadedFile::getInstance($model, 'imageFile')) 
            {
                $upload = 'uploads/produtos/'.$model->imageFile->baseName.'.'.$model->imageFile->extension;
                //VarDumper::dump($upload, 10, true);exit;
                if ($model->upload())
                {
                    $mod = $this->findModel($model->id);
                    $mod->foto = $upload;
                    $mod->save();
                } 
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Produto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //Setando a ultima modificação no produto
        $dataMod = date('Y-m-d H:i:s');
        $model->setAttribute('updated_at', $dataMod);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Salvando o valor total do produto
            $v_un = $model->getAttribute('valor_un');
            $qtd = $model->getAttribute('quantidade');
            $v_tot = $v_un * $qtd;
            $model->setAttribute('valor_tot', $v_tot);
            $model->save();

            //Upload da imagem do produto
            if ($model->imageFile = UploadedFile::getInstance($model, 'imageFile'))
            {            
                $upload = 'uploads/produtos/'.$model->imageFile->baseName.'.'.$model->imageFile->extension;
                if ($model->upload())
                {
                    $mod = $this->findModel($model->id);
                    $mod->foto = $upload;
                    $mod->save();
                }
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Produto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Venda::deleteAll(['produto_id' => $id]);
        if ($model->delete()) {
            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the Produto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
        }
     /**
      * Renderiza a tela de formulario
      */
    public function actionVenderForm($id)
    {
        $model = Produto::find()->where(['id' => $id])->one();

        $cliente = Cliente::find()->all();

        return $this->renderAjax('vender-form', [
            'model' => $model,
            'cliente' => $cliente
        ]);
    }
    /**
     * Vende o produto selecionado e insere o registro na tabela VENDAS
     */
    public function actionVender($id)
    { 
        $model = Produto::find()->where(['id' => $id])->one();
        $qtdB = $model->getAttribute('quantidade');
        //request no valor recebido via post 
        $qtd = Yii::$app->request->post('qtd');
        $valorProd = $model->getAttribute('valor_un');
        
        //Salva a venda do produto na tabela VENDA com os dados abaixo
        $venda = new Venda();
        $data = $venda->data_venda = date('Y-m-d');
        //Pega o valor do produto * a quantidade de produtos vendidos e insere na tabela VENDA
        $valorVenda = $valorProd * $qtd;
        $cliente = $venda->cliente_id = Yii::$app->request->post('cliente');
        $produto = $venda->produto_id = $model->getAttribute('id');

        $venda->setAttributes([
            'data_venda' => $data,
            'valor_final' => $valorVenda,
            'cliente_id' => $cliente,
            'produto_id' => $produto,
            'qtnd_vendida' => $qtd,
        ]);

        if ($qtdB >= $qtd) {
            $vf = $qtdB - $qtd;
            $dataMod = date('Y-m-d H:i:s');
            $model->setAttribute('updated_at', $dataMod);
            $model->setAttribute('quantidade', $vf);

            if ($model->save()) {
                $v_un = $model->getAttribute('valor_un');
                $qtd = $model->getAttribute('quantidade');
                $v_tot = $v_un * $qtd;
                $model->setAttribute('valor_tot', $v_tot);
                $model->save();
                $venda->save();
                Yii::$app->session->setFlash('success', 'Venda registrada com sucesso! <b><a href="/venda/index">Ir para vendas</a></b>');
                return $this->redirect(['/produto/view', 'id' => $id]);
            }
        } else {
            Yii::$app->session->setFlash('error', 'Quantidade informada indisponível!');
            return $this->redirect('/produto/view?id=' . $model->id);
        }
    }
    /**
     * Renderiza a tela de formulario para adicionar unidades do produto selecionado
     */
    public function actionAdicionarLayout($id){
        $model = Produto::findOne(['id' => $id]);
        return $this->renderAjax('adicionar', [
            'model' => $model
        ]);
    }

    public function actionAdicionar($id)
    {
        $model = Produto::findOne(['id' => $id]);
        $qtd = Yii::$app->request->post('add');
        $qtdb = $model->getAttribute('quantidade');
        $qtdf = $qtdb + $qtd;
        $dataMod = date('Y-m-d H:i:s');

        $model->setAttribute('quantidade', $qtdf);
        $model->setAttribute('updated_at', $dataMod);
        if ($model->update()) {
            $v_un = $model->getAttribute('valor_un');
            $quant = $model->getAttribute('quantidade');
            $v_tot = $v_un * $quant ;
            $model->setAttribute('valor_tot', $v_tot);
            $model->save();
            Yii::$app->session->setFlash('success', 'Foi adicionado ' . $qtd . ' unidade(s)');
            return $this->redirect('/produto/view?id=' . $model->id);
        }
    }
    /**
     * Renderiza a tela de formulario para remover unidades do produto selecionado
     */
    public function actionRemoverLayout($id){
        $model = Produto::findOne(['id' => $id]);
        return $this->renderAjax('remover', [
            'model' => $model
        ]);
    }

    public function actionRemover($id)
    {
        $model = Produto::findOne(['id' => $id]);
        $qtd = Yii::$app->request->post('remover');
        $qtdb = $model->getAttribute('quantidade');
        if ($qtdb >= $qtd) {
            $qtdf = $qtdb - $qtd;
            $dataMod = date('Y-m-d H:i:s');

            $model->setAttribute('quantidade', $qtdf);
            $model->setAttribute('updated_at', $dataMod);
            if ($model->update()) {
                $v_un = $model->getAttribute('valor_un');
                $quant = $model->getAttribute('quantidade');
                $v_tot = $v_un * $quant;
                $model->setAttribute('valor_tot', $v_tot);
                $model->save();
                Yii::$app->session->setFlash('success', 'Foi removido ' . $qtd . ' unidade(s)');
                return $this->redirect('/produto/view?id=' . $model->id);
            }
        } else {
            Yii::$app->session->setFlash('warning', 'Quantidade informada indisponível!');
            return $this->redirect('/produto/view?id=' . $model->id);
        }
    }
}
