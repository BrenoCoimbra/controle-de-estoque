<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <?php if (!Yii::$app->user->isGuest): ?>
            <h1>Controle de estoque</h1>
            <p><a class="btn btn-sm btn-success" href="/produto/index">Produtos</a></p>
        <?php endif; ?>
        <?php if (Yii::$app->user->isGuest): ?>
            <h2>Faça o login para continuar!</h2>
            <p><a class="btn btn-sm btn-success" href="/site/login">Login</a></p>
        <?php endif; ?>
    </div>

</div>
