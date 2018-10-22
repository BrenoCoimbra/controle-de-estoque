<?php

use kartik\alert\Alert;
use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Produto */

$this->title = $model->tipo;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-view">


    <?php if ($model->quantidade <= 20 && $model->quantidade > 0){ ?>
        <?= Alert::widget([
            'type' => Alert::TYPE_WARNING,
            'titleOptions' => ['icon' => 'info-sign'],
            'body' => '<i class="glyphicon glyphicon-alert" ></i> <b>Quantidade em estoque baixa. </b>'
        ]);
        ?>
    <?php } elseif ($model->quantidade == 0){ ?>
        <?= Alert::widget([
            'type' => Alert::TYPE_DANGER,
            'titleOptions' => ['icon' => 'info-sign'],
            'body' => '<i class="glyphicon glyphicon-alert" ></i> <b>Sem estoque. </b>'
        ]);
        ?>
    <?php }?>

    <p>
        <?php if (Yii::$app->user->can('produto/update')): ?>
            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?php endif; ?>
        <?php if (Yii::$app->user->can('produto/delete')): ?>
            <?= Html::a('<i class="glyphicon glyphicon-trash"></i> Deletar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem certeza que deseja excluir o ' . $model->tipo . '? OBS: Excluindo o produto, também ira exluir o registro de compra do mesmo',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>        
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => '<b>' . $model->tipo . '</b>',
            'type' => DetailView::TYPE_SUCCESS,
        ],
        'buttons1' => false,
        'attributes' => [
            'id',
            'tipo',
            'quantidade',
            [
                'attribute' => 'valor_un',
                'label' => 'Peço da unidade (R$)',
                'format' => 'decimal'
            ],
            [
                'attribute' => 'valor_tot',
                'label' => 'Valor total (R$)',
                'format' => 'decimal'
            ],
            [
                'attribute' => 'data_chegada',
                'format' => ['date', 'php:d/m/Y']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:d/m/Y H:i:s']
            ],
            [
                'attribute' => 'foto',
                'label' => 'Foto do produto',
                'format' => 'html',
                'value' => Html::img(Yii::$app->homeUrl . $model->foto, ['style' => 'width: 150px; height: 150px']),
            ],
        ],
    ]) ?>

        <?php if (Yii::$app->user->can('produto/adicionar')): ?>
            <?= Html::button('<i class="glyphicon glyphicon-plus" ></i> Adicionar', ['value' => Url::to(['produto/adicionar-layout', 'id' => $model->id]) , 'class' => 'btn  btn-primary', 'id' => 'modalButton']) ?>
                <?php
                    Modal::begin([
                            'header' => '<h3>Adicionar '.$model->tipo.'</h3>',
                            'id' => 'modal',  
                            'size' => 'modal-sm'          
                        ]); 
                    
                    echo '<div id="modalContent"></div>';

                    Modal::end(); ?>
        <?php endif; ?>
        
        <?php if (Yii::$app->user->can('produto/remover')): ?>
            <?= Html::button('<i class="glyphicon glyphicon-minus" ></i> Remover', ['value' => Url::to(['produto/remover-layout', 'id' => $model->id]) , 'class' => 'btn  btn-danger', 'id' => 'modalButtonR']) ?>
            <?php
                Modal::begin([
                        'header' => '<h3>Remover '.$model->tipo.'</h3>',
                        'id' => 'modalR',
                        'size' => 'modal-sm'
                    ]); 
                
                echo '<div id="modalContentR"></div>';

                Modal::end(); 
            ?>
        <?php endif; ?>

        <?php if (Yii::$app->user->can('produto/vender')): ?>
            <?= Html::button('<i class="glyphicon glyphicon-usd"></i> Registar venda', ['value' => Url::to(['vender-form', 'id' => $model->id]), 'class' => 'btn  btn-success', 'id' => 'modalButtonV']) ?>        
                <?php
                    Modal::begin([
                        'header' => '<h3>Registar venda de '.strtolower($model->tipo).'</h3>',
                        'id' => 'modalV',
                        'size' => 'modal-lg'
                    ]);
                    
                    echo '<div id="modalContentV"></div>';

                    Modal::end();
                ?>
        <?php endif; ?>