<?php

use app\models\Fornecedor;
use kartik\date\DatePicker;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="produto-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if (Yii::$app->user->can('produto/create')): ?>
    <?php endif; ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => false,
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'responsive' => false,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> Produtos</h3>',
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
            'tipo',
            [
                'attribute' => 'quantidade',
                'label' => 'Quantidade disponível',
            ],
            [
              'attribute' => 'valor_tot',
              'label' => 'Valor total (R$)',
              'format' => 'decimal'
            ],
            [
                'attribute' => 'data_chegada',
                'format' => ['date', 'php:d/m/Y'],
                'filter' => DatePicker::widget([
                    'name' => 'search',
                    'attribute' => 'data_chegada',
                    'model' => $searchModel,
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                ])
            ],
            [
                'attribute' => 'fornecedor_id',
                'value' => 'fornecedor.nome',
                'label' => 'Fornecedor',
                'filter' => ArrayHelper::map(Fornecedor::find()->all(), 'id', 'nome')

            ],

            [
                'class' => '\kartik\grid\ActionColumn',
                'width' => '10%',
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a('<i class="glyphicon glyphicon-eye-open" ></i> Ver mais', $url, ['class' => 'btn btn-flat btn-warning']);
                    },
                    'delete' => function ($url) {
                        return Html::a('<i class="glyphicon glyphicon-trash" ></i>', $url, [
                            'class' => 'btn btn-flat btn-danger',
                            'data' => [
                                'confirm' => 'Tem certeza que deseja exlcluir? OBS: Excluindo o produto, também ira exluir o registro de compra do mesmo',
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
                        'update' =>false,
                        'delete' =>false,
                        'view' => Yii::$app->user->can('produto/view'),
                    ]
            ],
        ],
    ]); ?>
</div>
