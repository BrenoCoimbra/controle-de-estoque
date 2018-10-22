<?php

use app\models\Cliente;
use app\models\Produto;
use kartik\date\DatePicker;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\VendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venda-index">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Vendas</small>
        </h1>
    </section>
    <section class="content">
        <!-- Informaçoes de vendas no dia atual -->
        <div class="row">
            <div class="col-xs-6">
                <div class="box box-success" style="position: relative; left: 0px; top: 0px;">
                    <div class="box-header ui-sortable-handle">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Dia</h3>
                    </div>
                    <div class="slimScrollDiv"
                         style="position: relative; overflow: hidden; width: auto; height: 180px;">
                        <div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: 250px;">
                            <!-- chat item -->
                            <div class="item">
                                <section class="content">
                                    <div class="col-xs-6 .col-md-4">
                                        <!-- small box -->
                                        <div class="small-box bg-aqua">
                                            <div class="inner">
                                                <h3>  <?php foreach ($diaVenda as $dia): ?>
                                                        <?= $dia['dia'] ?>
                                                    <?php endforeach; ?>
                                                </h3>
                                                <p><b>Novas vendas hoje</b></p>
                                            </div>
                                            <div class="icon"><i class="fa fa-bar-chart-o"></i></div>
                                            <div class="small-box-footer">
                                                <div class="text-center">
                                                    <?= Html::button('Informações <i class="fa fa-arrow-circle-right"></i> ', [
                                                        'value' => Url::to(['venda/info-venda']),
                                                        'class' => 'btn btn-link',
                                                        'id' => 'modalButtonS',
                                                        'style' => [
                                                            'color' => '#ffffff'
                                                        ]
                                                    ]) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-xs-6 .col-md-4">
                                        <!-- small box -->
                                        <div class="small-box bg-green">
                                            <div class="inner">
                                                <h3>R$<?php foreach ($valorDiaAtual as $vdia): ?>
                                                        <?= number_format($vdia['valor'], 2, ',', '.') ?>
                                                    <?php endforeach; ?>
                                                </h3>
                                                <p><b>Valor das vendas de hoje</b></p>
                                            </div>
                                            <div class="icon"><i class="fa fa-money"></i></div>
                                            <div class="small-box-footer">
                                                <div class="text-center">
                                                    <?= Html::button('<i class="fa fa-arrow-circle-right"></i> Informações', [
                                                        'value' => Url::to(['venda/info-venda']),
                                                        'class' => 'btn btn-link',
                                                        'id' => 'modalButtonVH',
                                                        'style' => [
                                                            'color' => '#ffffff'
                                                        ]
                                                    ]) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informaçoes de vendas no mes atual -->
            <div class="row">
                <div class="col-xs-6">
                    <div class="box box-success" style="position: relative; left: 0px; top: 0px;">
                        <div class="box-header ui-sortable-handle">
                            <i class="fa fa-calendar"></i>
                            <h3 class="box-title">Mês</h3>
                        </div>
                        <div class="slimScrollDiv"
                             style="position: relative; overflow: hidden; width: auto; height: 180px;">
                            <div class="box-body chat" id="chat-box"
                                 style="overflow: hidden; width: auto; height: 250px;">
                                <!-- chat item -->
                                <div class="item">
                                    <section class="content">
                                        <div class="row">
                                            <!-- ./col -->
                                            <div class="col-xs-6 .col-md-4">
                                                <!-- small box -->
                                                <div class="small-box bg-yellow">
                                                    <div class="inner">
                                                        <h3><?php foreach ($VendaMes as $vmes): ?>
                                                                <?= $vmes['vendames'] ?>
                                                            <?php endforeach; ?>
                                                        </h3>
                                                        <div class="icon"><i class="fa fa-bar-chart-o"></i></div>
                                                        <p><b>Vendas no mês</b></p>
                                                    </div>
                                                    <div class="small-box-footer">
                                                        <div class="text-center">
                                                            <?= Html::button('<i class="fa fa-arrow-circle-right"></i> Informações', [
                                                                'value' => Url::to(['venda/info-venda-mes']),
                                                                'class' => 'btn btn-link',
                                                                'id' => 'modalButtonM',
                                                                'style' => [
                                                                    'color' => '#ffffff'
                                                                ]
                                                            ]) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-xs-6 .col-md-4">
                                                <!-- small box -->
                                                <div class="small-box bg-red">
                                                    <div class="inner">
                                                        <h3>R$<?php foreach ($totValores as $tot): ?>
                                                                <?= number_format($tot['valor'], 2, ',', '.') ?>
                                                            <?php endforeach; ?>
                                                        </h3>
                                                        <p><b>Valor total das vendas no mês</b></p>
                                                    </div>
                                                    <div class="icon"><i class="fa fa-money"></i></div>
                                                    <div class="small-box-footer">
                                                        <div class="text-center">
                                                            <?= Html::button('<i class="fa fa-arrow-circle-right"></i> Informações', [
                                                                'value' => Url::to(['venda/info-venda-mes']),
                                                                'class' => 'btn btn-link',
                                                                'id' => 'modalButtonTM',
                                                                'style' => ['color' => '#ffffff']
                                                            ]) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'showPageSummary' => false,
            'responsive' => false,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'panel' => [
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> Vendas</h3>',
                'type' => 'primary',
                'footer' => false
            ],
            'columns' => [
                // ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'id',
                    'label' => 'Cód',
                    'contentOptions' => ['width' => '5%'],
                ],
                [
                    'attribute' => 'produto_id',
                    'value' => 'produto.tipo',
                    'label' => 'Produto',
                    'filter' => ArrayHelper::map(Produto::find()->all(), 'id', 'tipo')
                ],
                [
                    'attribute' => 'cliente_id',
                    'label' => 'Cliente',
                    'value' => 'cliente.nome',
                    'filter' => ArrayHelper::map(Cliente::find()->all(), 'id', 'nome')
                ],
                [
                    'attribute' => 'data_venda',
                    'label' => 'Data da venda',
                    'format' => ['date', 'php:d/m/Y'],
                    'filter' => DatePicker::widget([
                        'name' => 'search',
                        'attribute' => 'data_venda',
                        'model' => $searchModel,
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true
                        ]
                    ])
                ],
                'qtnd_vendida:integer',
                [
                    'attribute' => 'valor_final',
                    'format' => 'decimal',
                    'label' => 'Valor final (R$)'
                ],
                [
                    'class' => '\kartik\grid\ActionColumn',
                    'width' => '8%',
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
                            'update' => false,
                            'delete' => Yii::$app->user->can('produto/delete'),
                            'view' => Yii::$app->user->can('produto/view'),
                        ]
                ],
            ],
        ]); ?>
</div>
<?php Modal::begin([
    'header' => '<h3>Vendas de hoje</h3>',
    'id' => 'modalS',
]);

echo '<div id="modalContentS"></div>';

Modal::end(); ?>

<?php Modal::begin([
    'header' => '<h3>Vendas de hoje</h3>',
    'id' => 'modalVH',
]);

echo '<div id="modalContentS"></div>';

Modal::end(); ?>

<?php Modal::begin([
    'header' => '<h3>Vendas do mês</h3>',
    'id' => 'modalM',
]);

echo '<div id="modalContentM"></div>';

Modal::end(); ?>

<?php Modal::begin([
    'header' => '<h3>Vendas do mês</h3>',
    'id' => 'modalTM',
]);

echo '<div id="modalContentM"></div>';

Modal::end(); ?>
</section>