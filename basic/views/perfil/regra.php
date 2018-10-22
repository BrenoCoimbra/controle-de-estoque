<?php
/* @var $this yii\web\View */
?>
<h1>Regras</h1>

<form action="" method="post">
    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>" >
    <?php foreach ($permissoes as $permissao): ?>
        <div class="form-check">
            <input type="checkbox" name="permissoes[]"
                   id="permissoes_<?= $permissao->name ?>"
                   value="<?= $permissao->name ?>"
                <?= in_array($permissao->name, $permissoes_perfil) ? 'checked="checked"':'' ?>
            >
            <label for="permissoes_<?= $permissao->name ?>"><?= $permissao->name ?></label>
        </div>
    <?php endforeach; ?>
    <br>
    <button type="submit" class="btn btn-primary" >Cadastrar</button>
</form>
