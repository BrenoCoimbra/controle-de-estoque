<?php

use kartik\widgets\ActiveForm;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form kartik\widgets\ActiveForm */
?>

<div class="cliente-form">
    <?php $form = ActiveForm::begin() ?>
    <div class="form-group">
        <?= Form::widget([
            'model' => $model,
            'form' => $form,
            'columns' => 2,
            'attributes' => [
                'nome' => ['type' => Form::INPUT_TEXT, 'options' => ['class' => 'form-control', 'placeholder' => 'Informe o nome']],
                'email' => ['type' => Form::INPUT_TEXT, 'options' => ['class' => 'form-control', 'placeholder' => 'Informe o email']],
                'telefone' => [
                    'type' => Form::INPUT_WIDGET,
                    'widgetClass' => '\yii\widgets\MaskedInput',
                    'options' => [
                        'options' => [
                            'placeholder' => 'Informe o telefone ou celular',
                            'class' => 'form-control'
                        ],
                        'mask' => ['99 9 9999 9999'],
                        'clientOptions' => [
                            'removeMaskOnSubmit' => false,
                        ],
                    ],
                ],
                'endereco' => ['type' => Form::INPUT_TEXT, 'options' => ['class' => 'form-control', 'placeholder' => 'Informe o endereço']],
                'cpf' => [
                    'type' => Form::INPUT_WIDGET,
                    'widgetClass' => '\yii\widgets\MaskedInput',
                    'options' => [
                        'options' => [
                            'placeholder' => 'Informe o CPF',
                            'class' => 'form-control'
                        ],
                        'mask' => ['999.999.999-99'],
                    ],
                ],
                'sexo' => ['items' => ['masculino' => 'Masculino', 'feminino' => 'Feminino'], 'type' => Form::INPUT_RADIO_BUTTON_GROUP],
                'actions' => [
                    'type' => Form::INPUT_RAW,
                    'value' => '<input type="submit" value="Salvar" class="btn btn-success">'
                ],
            ]
        ]);
        ?>
    </div>
    <?php ActiveForm::end() ?>
</div>
