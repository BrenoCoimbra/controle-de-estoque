<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Fornecedor */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Fornecedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fornecedor-view">
<p>
        <?php if (Yii::$app->user->can('fornecedor/update')): ?>
            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
        <?php if (Yii::$app->user->can('fornecedor/delete')): ?>
            <?= Html::a('<i class="glyphicon glyphicon-trash"></i> Deletar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem certeza que deseja deletar o fornecedor ' . $model->nome . '?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>

        <?php
        Modal::begin([
            'header' => '<h4 class="modal-title">Produtos</h4>',
            'toggleButton' => ['label' => '<i class="glyphicon glyphicon-th-list"></i> Produtos fornecidos', 'class' => 'btn btn-success'],
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
                    'contentOptions' => ['width' => '5%'],
                ],
                'tipo',
                'quantidade',
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
            'telefone',
            'endereco',
            'cnpj',
        ],
    ]) ?>

</div>
