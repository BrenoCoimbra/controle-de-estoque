<div class="modalContentR">
    <?php if (Yii::$app->user->can('produto/remover')): ?>
        <form action="/produto/remover?id=<?= $model->id ?>" method="post">
            <input id="form-token" type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
                value="<?= Yii::$app->request->csrfToken ?>"/>
                <label for="iremove">Deseja remover quantas unidades?</label>
                <div class="form-group">
                    <input type="number" name="remover" id="iremove" class="form-control" placeholder="Informe a quantidade" >
                    <br>
                    <input type="submit" value="Remover" class="btn btn-warning">
                </div>
        </form>
    <?php endif; ?>
</div>