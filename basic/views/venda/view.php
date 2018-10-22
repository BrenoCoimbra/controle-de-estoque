<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Venda */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Vendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="venda-view">

    <?= DetailView::widget([
        'model' => $model,
        'hover' => true,
        'mode' => DetailView::MODE_VIEW,
        'panel' => [
            'heading' => '<b>'.$model->id.'</b>',
            'type' => DetailView::TYPE_SUCCESS,
        ],
        'buttons1' => false,
        'attributes' => [
            [
                'attribute' => 'id',
                'label' => 'Código'
            ],
            [
                'attribute' => 'cliente_id',
                'value' => $model->cliente->nome ,
                'label' => 'Cliente'
            ],
            [
                'attribute' => 'produto_id',
                'value' => $model->produto->tipo ,
                'label' => 'Produto'
            ],
            [
                'attribute' => 'data_venda',
                'label' => 'Data da venda',
                'format' => ['date', 'php:d/m/Y']
            ],
            'qtnd_vendida',
            [
                'attribute' => 'valor_final',
                'format' => 'decimal',
                'label' => 'Valor final (R$)'
            ],
        ],
    ]) ?>

</div>
