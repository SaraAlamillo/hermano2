<?= anchor(site_url('hermano'), 'Volver al listado') ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <td>Año</td>
            <td>Descripción</td>
            <td>Primer pago</td>
            <td>Segundo pago</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listado as $l): ?>
            <tr>
                <td><?= $l->anio ?></td>
                <td><?= $l->descripcion ?></td>
                <?php if (empty($l->plazo1)): ?>
                    <td>NO PAGADO</td>
                <?php else: ?>
                    <td><?= $l->plazo1 ?></td>
                <?php endif; ?>
                <?php if (empty($l->plazo2)): ?>
                    <td>NO PAGADO</td>
                <?php else: ?>
                    <td><?= $l->plazo2 ?></td>
                <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
