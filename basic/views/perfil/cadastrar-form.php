<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<h1>Cadastro de perfil</h1>
<div class="form-group">
    <form action="cadastrar" method="post">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>"
               value="<?= Yii::$app->request->csrfToken; ?>"/>
        <label for="perfil">Perfil</label>
        <input type="text" id="perfil" name="perfil" class="form-control">
</div>

<div class="form-group">
    <label for="perfil_pai">Perfil Pai</label>
    <select name="perfil_pai" id="perfil_pai" class="form-control">
        <option value="">Selecione</option>
        <?php foreach ($perfis as $perfil): ?>
            <option value="<?= $perfil->name ?>"><?= $perfil->name ?></option>
        <?php endforeach; ?>
    </select>
</div>

<input type="submit" value="Cadastrar" class="btn btn-primary">
</form>
