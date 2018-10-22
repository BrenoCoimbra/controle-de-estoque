<?php
/* @var $this yii\web\View */

use yii\bootstrap\Html;
use yii\helpers\Url;

?>
<h1>Permissões</h1>
<?php if (Yii::$app->user->can('permissao/cadastrar')): ?>
<?php echo Html::a('Cadastrar permissão', [Url::toRoute(['cadastrar-permissao-form'])],  ['class' => 'btn btn-default']); ?>
<?php endif;?>
<hr>

<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th>Permissão</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($model as $rows): ?>
        <tr>
            <td><?= $rows->name ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
