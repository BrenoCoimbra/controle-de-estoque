<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<h1>Perfis</h1>
<?php if (Yii::$app->user->can('perfil/cadastrar')): ?>
    <?= Html::a('Cadastrar perfil', [Url::toRoute(['cadastrar'])], ['class' => 'btn btn-primary']) ?>
<?php endif; ?>

<hr>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Perfis</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th>Perfil</th>
                <th>Regra</th>
                <?php foreach ($model as $rows): ?>
            <tr>
                <td><?= $rows->name ?></td>
                <td>
                    <?php if (Yii::$app->user->can('perfil/cadastrar')) { ?>
                        <?php echo Html::a('Atribuir regra', [Url::toRoute(['perfil/cadastrar-regra', 'perfil' => $rows->name])], ['class' => 'btn btn-default']); ?>
                    <?php } elseif (Yii::$app->user->isGuest) {
                        echo "<a href='/site/login' class='btn btn-group-xs'>Faça o login para ter acesso! </a>";
                    } else {
                        echo "<p><b>Você não tem accesso!</b></b></p>";
                    } ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
