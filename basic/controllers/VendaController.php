<?php

namespace app\controllers;

use app\models\Produto;
use Yii;
use app\models\Venda;
use app\models\search\VendaSearch;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VendaController implements the CRUD actions for Venda model.
 */
class VendaController extends Controller
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
     * Lists all Venda models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VendaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //$totVenda = Venda::find()->count();
        $conn = \Yii::$app->db;
        $VendaMes = $conn->createCommand('SELECT data_venda, COUNT(*) as vendames FROM venda WHERE MONTH(data_venda) = MONTH(CURDATE())')->queryAll();
        $totValores = $conn->createCommand('SELECT sum(valor_final) as valor, data_venda FROM venda WHERE MONTH(data_venda) = MONTH(CURDATE())')->queryAll();
        $diaVenda = $conn->createCommand('SELECT data_venda,COUNT(*) as dia FROM venda WHERE data_venda = CURDATE()')->queryAll();
        $valorDiaAtual =  $conn->createCommand('SELECT data_venda, sum(valor_final) as valor  FROM venda WHERE data_venda = CURDATE()')->queryAll();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'VendaMes' => $VendaMes,
            'totValores' => $totValores,
            'diaVenda' => $diaVenda,
            'valorDiaAtual' => $valorDiaAtual,
        ]);
    }

    /**
     * Displays a single Venda model.
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
     * Deletes an existing Venda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Venda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Venda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Venda::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionInfoVenda(){

        $conn = \Yii::$app->db;
        $diaVenda = $conn->createCommand('SELECT * FROM venda JOIN cliente as c ON venda.cliente_id = c.id JOIN produto as p ON venda.produto_id = p.id WHERE data_venda = CURDATE()')->queryAll();
        $VendaMes = $conn->createCommand('SELECT * FROM venda JOIN cliente as c ON venda.cliente_id = c.id JOIN produto as p ON venda.produto_id = p.id WHERE MONTH(data_venda) = MONTH(CURDATE())')->queryAll();

        return $this->renderAjax('info', [
            'diaVenda' => $diaVenda,
            'VendaMes' => $VendaMes
        ]);
    }
    public function actionInfoVendaMes(){

        $conn = \Yii::$app->db;
        $VendaMes = $conn->createCommand('SELECT * FROM venda JOIN cliente as c ON venda.cliente_id = c.id JOIN produto as p ON venda.produto_id = p.id WHERE MONTH(data_venda) = MONTH(CURDATE())')->queryAll();

        return $this->renderAjax('info-mes', [
            'VendaMes' => $VendaMes
        ]);
    }

}
