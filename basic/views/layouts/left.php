<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <?php if (!Yii::$app->user->isGuest) { ?>
                <img src="<?= $directoryAsset ?>/img/avatar5.png " class="img-circle" alt="User Image"/>     
            <?php }else { ?>
                <img src="<?= $directoryAsset ?>/img/avatar.png" class="img-circle" alt="User Image"/>
            <?php } ?>
            </div>
            <div class="pull-left info pull-left image">
            <?php if (!Yii::$app->user->isGuest) { ?>
                <p><?= Yii::$app->user->identity->nome ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                <?php }else{ ?>
                    <p>Convidado</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                <?php } ?>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Pesquisar..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Controle', 'options' => ['class' => 'header']],
                    ['label' => 'Produtos', 'icon' => 'list', 'url' => ['/produto/index']],
                    ['label' => 'Fornecedores', 'icon' => 'truck', 'url' => ['/fornecedor/index']],
                    ['label' => 'Clientes', 'icon' => 'users', 'url' => ['/cliente/index']],
                    ['label' => 'Vendas', 'icon' => 'dollar', 'url' => ['/venda/index']],
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Ferramentas Yii',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                        ],
                    ],
                    [
                        'label' => 'Segurança',
                        'visible' => Yii::$app->user->can('seguranca'),
                        'icon' => 'lock',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Usuário', 'icon' => 'user', 'url' => ['/usuario/index'],],
                            ['label' => 'Perfis', 'icon' => 'users', 'url' => ['/perfil/index'],],
                            ['label' => 'Regras', 'icon' => 'lock', 'url' => ['/perfil/listar-regras'],],
                            ['label' => 'Permissões', 'icon' => 'unlock', 'url' => ['/perfil/permissao'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
