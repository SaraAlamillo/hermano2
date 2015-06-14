<?php if (!is_null($alerta)): ?>
    <div class="alert alert-<?= $alerta['tipo'] ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $alerta['mensaje'] ?>
    </div>
<?php endif; ?>

<h1>Listado de remesas</h1>
<?= anchor(site_url('remesa/insertar'), '<img alt="Añadir una remesa" title="Añadir una remesa" src="'. base_url() . 'assets/images/icons/btnAddRemesa.png" />') ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Año</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listado as $l): ?>
            <tr>
                <td><?= $l->anio ?></td>
                <td><?= $l->descripcion ?></td>
                <td>
                    <?= anchor(site_url('remesa/cambiar/' . $l->idRemesa), '<img alt="Modificar una remesa" title="Modificar una remesa" src="' . base_url() . 'assets/images/icons/iconEditar.png" />') ?>
                    <?= anchor(site_url('remesa/elimina/' . $l->idRemesa), '<img alt="Eliminar una remesa" title="Eliminar una remesa" src="' . base_url() . 'assets/images/icons/iconBorrar.png" />') ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
