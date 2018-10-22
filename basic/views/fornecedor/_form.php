<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Fornecedor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fornecedor-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-6">
            <?= $form->field($model, 'nome')->textInput(['maxlength' => true, 'placeholder' => 'Informe o nome do fornecedor']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'telefone')->widget(MaskedInput::className(), [
                'mask' => '99 9999-9999',
                'options' => [
                    'placeholder' => 'Informe o telefone',
                    'class' => 'form-control'
                ]
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'endereco')->textInput(['maxlength' => true, 'placeholder' => 'Informe o endereço']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'cnpj')->widget(MaskedInput::className(), [
                'mask' => '99.999.999/9999-99',
                'options' => [
                    'placeholder' => 'Informe o CNPJ',
                    'class' => 'form-control'
                ]
            ]) ?>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
