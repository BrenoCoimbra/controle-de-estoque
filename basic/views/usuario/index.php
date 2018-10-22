<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if (Yii::$app->user->can('usuario/create')): ?>
        <p>
            
        </p>
    <?php endif; ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'panel' => [
            'heading' => 'Usuarios',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Cadastrar', ['create'], ['class' => 'btn btn-primary']),
            'type' => 'primary',
            'footer' => false,
        ],
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'responsive' => false,
        'hover' => true,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            'id',
            'nome',
            'usuario',
            //'senha',
            //'auth_key',
            //'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 10%'],
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a('<i class="glyphicon glyphicon-eye-open" ></i>', $url, ['class' => 'btn btn-warning']);
                    },
                    'delete' => function ($url) {
                        return Html::a('<i class="glyphicon glyphicon-trash" ></i>', $url, [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Tem certeza que deseja exlcluir?',
                                'method' => 'post'
                            ]
                        ]);
                    },
                    'update' => function ($url) {
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>', $url, ['class' => 'btn btn-default']);
                    }
                ],
                'visible' => Yii::$app->user->can('usuario/create'),
            ],
        ],
    ]); ?>
</div>
