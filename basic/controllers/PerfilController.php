<?php

namespace app\controllers;

use Yii;

class PerfilController extends \yii\web\Controller
{
    public function actionCadastrar()
    {
        $auth = Yii::$app->authManager;

        $perfis = $auth->getRoles();

        if(Yii::$app->request->isPost){
            $perfil = Yii::$app->request->post('perfil');
            $perfil_pai = Yii::$app->request->post('perfil_pai');


            $perfil = $auth->createRole($perfil);

            if ($auth->add($perfil)){
                return $this->redirect('index');
            }

            if (!empty($perfil_pai)) {
                $perfil_pai = $auth->getRole($perfil_pai);
                $auth->addChild($perfil_pai, $perfil);
            }

        }
        return $this->render('cadastrar-form', [
            'perfis' => $perfis
        ]) ;
    }

    public function actionCadastrarPermissao()
    {
        $auth = \Yii::$app->authManager;

        $model = $auth->getPermissions();

        if (\Yii::$app->request->isPost){
            $permissao = \Yii::$app->request->post('permissao');

            $permissao = $auth->createPermission($permissao);
            $auth->add($permissao);
        }

        return $this->render('permissao-form', [
            'model' => $model
        ]) ;
    }

    public function actionCadastrarRegra($perfil)
    {
        $auth = \Yii::$app->authManager;

        $role = $auth->getRole($perfil);

        if (!$perfil || empty($role)){
            throw new \yii\web\NotFoundHttpException('Perfil não encontrado');
        }

        $permissoes = $auth->getPermissionsByRole($perfil);

        $permissoes_perfil = [];

        foreach ($permissoes as $permissao) {
            $permissoes_perfil[] = $permissao->name;
        }

        $permissoes  = $auth->getPermissions();

        if (\Yii::$app->request->isPost){
            $auth->removeChildren($role);

            $permissoes_form = \Yii::$app->request->post('permissoes');
            foreach ($permissoes_form as $perm){;
                $item = $auth->getPermission($perm);
                $auth->addChild($role, $item);
            }
            return $this->redirect('/perfil/index');
        }

        return $this->render('regra', [
            'permissoes_perfil' => $permissoes_perfil,
            'permissoes' => $permissoes
        ]);
    }

    public function actionIndex()
    {
        $app = Yii::$app->authManager;
        $model = $app->getRoles();
        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionPermissao()
    {
        $app = Yii::$app->authManager;
        $model = $app->getPermissions();
        return $this->render('permissao', [
            'model' => $model
        ]);
    }

    public function actionListarRegras()
    {
        $app = Yii::$app->authManager;
        $model = $app->getPermissions();
        return $this->render('listar-regras', [
            'model' => $model
        ]);
    }

    public function actionCadastrarPermissaoForm()
    {
        return $this->render('permissao-form');
    }
}
