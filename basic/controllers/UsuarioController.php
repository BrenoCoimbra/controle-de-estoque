<?php

namespace app\controllers;


use app\models\Usuario;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
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
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Usuario::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
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
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuario();

        $auth = \Yii::$app->authManager;
        $perfis = $auth->getRoles();

        $perfisDp = [];
        foreach ($perfis as $perfil) {
            $perfisDp[$perfil->name] = $perfil->name;
        }

        if ($model->load(\Yii::$app->request->post())) {

            $senha = Yii::$app->security->generatePasswordHash($model->getAttribute('senha'));
            $model->setAttribute('senha', $senha);

            $date = date('Y-m-d');
            $model->setAttribute('dt_cadastro', $date);

            $model->auth_key = \Yii::$app->security->generateRandomString(64);

            $perfil_form = \Yii::$app->request->post('Usuario')['perfil'];

            if ($model->save()) {
                $perfil = $auth->getRole($perfil_form);
                $auth->assign($perfil, $model->id);

                return $this->redirect(['view', 'id' => $model->id]);
            };
        }

        return $this->render('create', [
            'model' => $model,
            'perfisDp' => $perfisDp,
        ]);
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $auth = \Yii::$app->authManager;
        $perfis = $auth->getRoles();

        $perfisDp = [];
        foreach ($perfis as $perfil) {
            $perfisDp[$perfil->name] = $perfil->name;
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $senha = \Yii::$app->security->generatePasswordHash($model->getAttribute('senha'));

            $model->setAttribute('senha', $senha);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            };


        }

        return $this->render('update', [
            'model' => $model,
            'perfisDp' => $perfisDp,
        ]);
    }

    /**
     * Deletes an existing Usuario model.
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
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
