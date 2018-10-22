<div class="modalContentM">
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Produto</th>
            <th>Cliente</th>
            <th>Valor final</th>
            <th>Quantidade</th>
            <th>Data</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($VendaMes as $mes): ?>
            <tr>
                <td><?= $mes['id'] ?></td>
                <td><?= $mes['tipo'] ?></td>
                <td><?= $mes['nome'] ?></td>
                <td><?= $mes['valor_final'] ?></td>
                <td><?= $mes['qtnd_vendida'] ?></td>
                <td><?php
                    echo date('m/d/Y', strtotime($mes['data_venda'])) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
