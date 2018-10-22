<?php
/* @var $this yii\web\View */
?>
<h1>Cadastrar permissões</h1>


<form action="cadastrar-permissao" method="post">
    <div class="form-group">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>" >
        <label for="permissao">Permissão</label>
        <input type="text" name="permissao" id="permissao" class="form-control">
    </div>
    <br>
    <button type="submit" class="btn btn-primary" >Cadastrar</button>
</form>
