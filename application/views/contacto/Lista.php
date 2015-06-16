<?php if (!is_null($alerta)): ?>
    <div class="alert alert-<?= $alerta['tipo'] ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $alerta['mensaje'] ?>
    </div>
<?php endif; ?>

<h1>Agenda de contactos</h1>
			<?php if ($rolActual == 'Administrador') : ?>
<?= anchor(site_url('contacto/nuevo'), '<img alt="Añadir un contacto" title="Añadir un contacto" src="' . base_url() . 'assets/images/icons/btnAddContacto.png" />') ?>
			<?php endif; ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Empresa</th>
            <th>Nombre</th>
            <th>Primer apellido</th>
            <th>Segundo apellido</th>
            <th>Teléfono móvil</th>
            <th>Teléfono fijo</th>
            <th>Acciones</th>
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
			<?php if ($rolActual == 'Administrador') : ?>
                    <?= anchor(site_url('contacto/cambio/' . $l->idContacto), '<img alt="Modificar un contacto" title="Modificar un contacto" src="' . base_url() . 'assets/images/icons/iconEditar.png" />') ?>
                    <?= anchor(site_url('contacto/eliminar/' . $l->idContacto), '<img alt="Eliminar un contacto" title="Eliminar un contacto" src="' . base_url() . 'assets/images/icons/iconBorrar.png" />') ?>
			<?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
