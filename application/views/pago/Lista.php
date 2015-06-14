<?php if (!is_null($alerta)): ?>
    <div class="alert alert-<?= $alerta['tipo'] ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $alerta['mensaje'] ?>
    </div>
<?php endif; ?>
<h1>Listado de pagos de <?= $listado[0]->nombre . ' ' . $listado[0]->apellido1 . ' ' . $listado[0]->apellido2 ?></h1>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Año</th>
            <th>Descripción</th>
            <th>Primer pago</th>
            <th>Segundo pago</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listado as $l): ?>
            <?php if (empty($l->plazo1) || empty($l->plazo2)): ?>
                <tr class="danger">
                <?php else: ?>
                <tr class="success">
                <?php endif; ?>
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
<?= anchor(site_url('hermano'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>
