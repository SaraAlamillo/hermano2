<?php if (!is_null($alerta)): ?>
    <div class="alert alert-<?= $alerta['tipo'] ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $alerta['mensaje'] ?>
    </div>
<?php endif; ?>

<h1>Agenda de contactos</h1>
<?= anchor(site_url('contacto/nuevo'), '<img alt="Añadir un contacto" title="Añadir un contacto" src="' . base_url() . 'assets/images/icons/btnAddContacto.png" />') ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <td>Empresa</td>
            <td>Nombre</td>
            <td>Primer apellido</td>
            <td>Segundo apellido</td>
            <td>Teléfono móvil</td>
            <td>Teléfono fijo</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listado as $l): ?>
            <tr>
                <td><?= $l->nombre_empresa ?></td>
                <td><?= $l->nombre ?></td>
                <td><?= $l->apellido1 ?></td>
                <td><?= $l->apellido2 ?></td>
                <td><?= $l->movil ?></td>
                <td><?= $l->fijo ?></td>
                <td>
                    <?= anchor(site_url('contacto/detalle/' . $l->idContacto), '<img alt="Ver detalles de un contacto" title="Ver detalles de un contacto" src="' . base_url() . 'assets/images/icons/iconVer.png" />') ?>
                    <?= anchor(site_url('contacto/cambio/' . $l->idContacto), '<img alt="Modificar un contacto" title="Modificar un contacto" src="' . base_url() . 'assets/images/icons/iconEditar.png" />') ?>
                    <?= anchor(site_url('contacto/eliminar/' . $l->idContacto), '<img alt="Eliminar un contacto" title="Eliminar un contacto" src="' . base_url() . 'assets/images/icons/iconBorrar.png" />') ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
