<?php if (!is_null($alerta)): ?>
    <div class="alert alert-<?= $alerta['tipo'] ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $alerta['mensaje'] ?>
    </div>
<?php endif; ?>

<h1>Listados de hermanos dados de alta</h1>
<?= anchor(site_url('hermano/nuevo'), '<img alt="Añadir un hermano" title ="Añadir un hermano" src="' . base_url() . 'assets/images/icons/btnAddHno.png" />') ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Primer apellido</th>
            <th>Segundo apellido</th>
            <th>Familia</th>
            <th>¿Tiene medalla?</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listado as $l): ?>
            <?php if ($morosos[$l->idHermano]): ?>
                <tr class="danger">
                <?php else: ?>
                <tr class="success">
                <?php endif; ?>
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
                    <?= anchor(site_url('pago/lista/' . $l->idHermano), '<img alt="Ver pagos" title ="Ver pagos" src="' . base_url() . 'assets/images/icons/iconPagoHno.png" />') ?>
                    <?= anchor(site_url('hermano/detalle/' . $l->idHermano), '<img alt="Ver detalles" title ="Ver detalles" src="' . base_url() . 'assets/images/icons/iconVer.png" />') ?>
                    <?= anchor(site_url('hermano/cambio/' . $l->idHermano), '<img alt="Modificar" title ="Modificar" src="' . base_url() . 'assets/images/icons/iconEditar.png" />') ?>
                    <?= anchor(site_url('hermano/elimina/' . $l->idHermano), '<img alt="Eliminar" title ="Eliminar" src="' . base_url() . 'assets/images/icons/iconBorrar.png" />') ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

