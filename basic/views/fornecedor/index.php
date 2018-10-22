<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FornecedorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fornecedores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedor-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if (Yii::$app->user->can('fornecedor/create')): ?>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => false,
        'responsive' => false,
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> Fornecedores</h3>',
            'before'=> Html::a('<i class="glyphicon glyphicon-plus" ></i> Cadastrar', ['create'], ['class' => 'btn btn-primary']),
            'type' => 'primary',
            'footer' => false
        ],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
              'attribute' => 'id',
              'contentOptions' => ['style' => 'width: 5%']
            ],
            'nome',
            'telefone',
            'endereco',
            //'cnpj',

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
                                'confirm' => 'Tem certeza que deseja exlcluir?',
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
