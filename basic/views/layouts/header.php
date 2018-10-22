<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if (Yii::$app->user->isGuest) { ?>
                            <img src="<?= $directoryAsset ?>/img/avatar.png" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">Convidado</span>    
                        <?php }else{ ?>
                            <img src="<?= $directoryAsset ?>/img/avatar5.png" class="user-image" alt="User Image"/>
                            <span class="hidden-xs"><?= Yii::$app->user->identity->nome ?></span>
                        <?php } ?>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php if(!Yii::$app->user->isGuest){ ?>
                                <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle"
                                 alt="User Image"/>
                                <p>
                                    <b><?= Yii::$app->user->identity->nome ?></b>
                                    <small>Membro desde 
                                    <?php
                                        $date = Yii::$app->user->identity->dt_cadastro;
                                        echo date("M - Y", strtotime($date));
                                    ?>
                                    </small>
                                </p>
                            <?php }else { ?>
                                <img src="<?= $directoryAsset ?>/img/avatar.png" class="img-circle" alt="User Image"/>
                                <p>
                                    <b>Convidado</b>
                                </p>
                            <?php } ?>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                        <?php if(!Yii::$app->user->isGuest): ?>                        
                            <div class="pull-left">
                                <a href="/usuario/view?id=<?= Yii::$app->user->identity->id ?>" class="btn btn-default btn-flat">Perfil</a>  
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sair',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        <?php endif; ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
