<?php if (!is_null($alerta)): ?>
    <div class="alert alert-<?= $alerta['tipo'] ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $alerta['mensaje'] ?>
    </div>
<?php endif; ?>

<?= anchor(site_url('hermano/nuevo'), 'Añadir un hermano') ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <td>Número</td>
            <td>Nombre</td>
            <td>Primer apellido</td>
            <td>Segundo apellido</td>
            <td>Familia</td>
            <td>¿Tiene medalla?</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listado as $l): ?>
            <tr>
                <td><?= $l->idHermano ?></td>
                <td><?= $l->nombre ?></td>
                <td><?= $l->apellido1 ?></td>
                <td><?= $l->apellido2 ?></td>
                <td><?= $l->familia ?></td>
                <?php if ($l->medalla == 1): ?>
                    <td>Si</td>
                <?php else: ?>
                    <td>No</td>
                <?php endif; ?>                   
                <td>
                    <?= anchor(site_url('pago/lista/' . $l->idHermano), 'Ver pagos') ?>
                    <?= anchor(site_url('hermano/detalle/' . $l->idHermano), 'Ver detalles') ?>
                    <?= anchor(site_url('hermano/cambio/' . $l->idHermano), 'Modificar') ?>
                    <?= anchor(site_url('hermano/elimina/' . $l->idHermano), 'Eliminar') ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
