<?php
use yii\bootstrap\Html;
use yii\helpers\Url;
?>
<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th>Perfil</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($model as $rows): ?>
        <tr>
            <td><?= $rows->name ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>