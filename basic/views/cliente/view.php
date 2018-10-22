<?php

use yii\bootstrap\Modal;
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">
    <p>
        <?php if (Yii::$app->user->can('cliente/update')): ?>
            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>

        <?php if (Yii::$app->user->can('cliente/delete')): ?>
            <?= Html::a('<i class="glyphicon glyphicon-trash"></i> Deletar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem certeza que deseja exlcluir?  Obs: Excluindo o cliente, TODOS os registros de vendas ligadas a ele serão excluídas',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>
        <?php
        Modal::begin([
            'header' => '<h4 class="modal-title">Compras</h4>',
            'toggleButton' => ['label' => '<i class="glyphicon glyphicon-usd"></i> Compras efetuadas por esse cliente', 'class' => 'btn btn-success'],
            'options' => ['tabindex' => false]
        ]);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'summary' => false,
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
                ],
                [
                    'attribute' => 'cliente_id',
                    'label' => 'Cliente',
                    'value' => 'cliente.nome',
                ],
                [
                    'attribute' => 'data_venda',
                    'label' => 'Data da Compra',
                    'format' => ['date', 'php:d/m/Y']
                ],
                'qtnd_vendida',
                [
                    'attribute' => 'valor_final',
                    'format' => 'decimal',
                    'label' => 'Valor final (R$)'
                ]
            ],
        ]); // refer the demo page for widget settings
        Modal::end();
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => '<b>'.$model->nome.'</b>',
            'type' => DetailView::TYPE_SUCCESS,
        ],
        'buttons1' => false,
        'attributes' => [
            'id',
            'nome',
            'email:email',
            'telefone',
            'cpf',
            'endereco',
            [
                'attribute' => 'sexo',
                'label' => 'Sexo',
                'value' => ucfirst($model->sexo),
            ]
        ],
    ]) ?>
</div>



