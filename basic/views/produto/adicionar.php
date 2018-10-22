
    <div id="modalContent">
        <form action="/produto/adicionar?id=<?= $model->id ?>" method="post">
            <input id="form-token" type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>"/>
            <label for="iadd">Deseja adicionar quantas unidades</label>
            <div class="form-group">
                    <input type="number" name="add" id="iadd" class="form-control" placeholder="Informe a quantidade">
                    <br>
                    <input type="submit" value="Adicionar" class="btn btn-success">
            </div>
        </form>            
    </div>
