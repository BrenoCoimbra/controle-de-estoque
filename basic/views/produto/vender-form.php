<?php

use kartik\detail\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Produto */

$this->title = 'Vender Produto';
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modalContentV">
    <?= DetailView::widget([
        'model' => $model,
        'hover' => true,
        'hAlign' => DetailView::ALIGN_CENTER,
        'panel' => [
            'heading' => '<b>' . $model->tipo . '</b>',
            'type' => 'primary'
        ],
        'buttons1' => '',
        'attributes' => [
            'tipo',
            [
                'attribute' => 'quantidade',
                'label' => 'Quantidade diponível'
            ],
            [
                'attribute' => 'valor_un',
                'label' => 'Valor da unidade (R$)',
                'format' => 'decimal'
            ]
        ],
    ]) ?>

    
        <form action="/produto/vender?id=<?= $model->id ?>" method="post">
            <input id="form-token" type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
                value="<?= Yii::$app->request->csrfToken ?>"/>

            <label for="iqtd">Insira a quantidade vendida</label>

            <input class="form-control form-control-sm" type="number" name="qtd" id="iqtd"
                class="form-control form-control-lg">

            <label class="mr-sm-2" for="cliente">Cliente</label>
            <select name="cliente" id="cliente" class="form-control form-control-sm">
            <option value="">SELECIONE O CLIENTE QUE EFETUOU A COMPRA</option>
                <?php foreach ($cliente as $rows): ?>
                    <option value="<?= $rows['id'] ?>"><?= $rows['nome'] ?></option>
                <?php endforeach; ?>
            </select>
            <hr>
            <input type="submit" value="Registrar" class="btn btn-success">
        </form>
    

</div>