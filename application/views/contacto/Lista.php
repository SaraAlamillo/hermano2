<?php if (!is_null($mensaje)): ?>
    <p><?= $mensaje ?></p>
<?php endif; ?>
<?= anchor(site_url('contacto/nuevo'), 'Añadir un contacto') ?>
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
                    <?= anchor(site_url('contacto/detalle/' . $l->idContacto), 'Ver') ?>
                    <?= anchor(site_url('contacto/cambio/' . $l->idContacto), 'Modificar') ?>
                    <?= anchor(site_url('contacto/eliminar/' . $l->idContacto), 'Eliminar') ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
