<?php

use app\models\Fornecedor;

use kartik\datecontrol\DateControl;
use kartik\money\MaskMoney;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Form::widget([
        'form' => $form,
        'model' => $model,
        'columns' => 3,
        'attributes' => [
            'tipo' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Informe o tipo do produto']],
            'quantidade' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Informe a quantidade', 'type' => 'number']],
            'data_chegada' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => DateControl::className(),
                'options' => [
                    'options' => [
                        'placeholder' => 'Informe a data de chegada'
                    ],
                    'type' => DateControl::FORMAT_DATE,
                    'displayFormat' => 'dd/MM/yyyy',
                    'ajaxConversion' => false,
                    'widgetOptions' => [
                        'pluginOptions' => [
                            'autoclose' => true
                        ]
                    ]
                ]
            ]
        ]
    ]);
    echo Form::widget([
        'form' => $form,
        'model' => $model,
        'columns' => 3,
        'attributes' => [
            'valor_un' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => MaskMoney::className(),
                'options' => [
                    'options' => [
                        'placeholder' => 'Informe o valor do produto'
                    ],
                    'pluginOptions' => [
                        'prefix' => 'R$ ',
                        'allowNegative' => false
                    ]
                ],
            ],
            'fornecedor_id' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => Select2::className(),
                'options' => [
                    'model' => $model,
                    'data' => ArrayHelper::map(Fornecedor::find()->all(), 'id', 'nome'),
                    'attribute' => 'fornecedor_id',
                    'options' => ['placeholder' => 'Selecione o fornecedor'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]
            ],
            'imageFile' => ['type' => Form::INPUT_FILE]
        ]
    ]);

    ?>
    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
