<div class="modalContentS">
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
        <?php foreach ($diaVenda as $dia): ?>
            <tr>
                <td><?= $dia['id'] ?></td>
                <td><?= $dia['tipo'] ?></td>
                <td><?= $dia['nome'] ?></td>
                <td><?= $dia['valor_final'] ?></td>
                <td><?= $dia['qtnd_vendida'] ?></td>
                <td><?php
                    echo date('m/d/Y', strtotime($dia['data_venda'])) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
