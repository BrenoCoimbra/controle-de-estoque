<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <h1><?php // echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (Yii::$app->user->can('cliente/create')): ?>

    <?php endif; ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive' => false,
        'showPageSummary' => false,
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> Clientes</h3>',
            'before'=> Html::a('<i class="glyphicon glyphicon-plus" ></i> Cadastrar', ['create'], ['class' => 'btn btn-primary']),
            'type' => 'primary',
            'footer' => false
        ],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'contentOptions' => ['width' => '5%'],
            ],
            'nome',
            'email:email',
            'telefone',
            'cpf',
            //'endereco',
            //'sexo',

            [
                'class' => '\kartik\grid\ActionColumn',
                'width' => '10%',
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a('<i class="glyphicon glyphicon-eye-open" ></i>', $url, ['class' => 'btn btn-flat btn-warning']);
                    },
                    'delete' => function ($url) {
                        return Html::a('<i class="glyphicon glyphicon-trash" ></i>', $url, [
                            'class' => 'btn btn-flat btn-danger',
                            'data' => [
                                'confirm' => 'Tem certeza que deseja exlcluir? OBS: Excluindo o cliente, também ira exluir o registro de compra do mesmo',
                                'method' => 'post'
                            ]
                        ]);
                    },
                    'update' => function ($url) {
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>', $url, ['class' => 'btn btn-flat btn-default']);
                    }
                ],
                'visibleButtons' =>
                    [
                        'update' => Yii::$app->user->can('produto/update'),
                        'delete' => Yii::$app->user->can('produto/delete'),
                        'view' => Yii::$app->user->can('produto/view'),
                    ]
            ],
        ],
    ]); ?>
</div>
