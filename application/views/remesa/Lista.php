<?php if (!is_null($alerta)): ?>
    <div class="alert alert-<?= $alerta['tipo'] ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $alerta['mensaje'] ?>
    </div>
<?php endif; ?>

<?= anchor(site_url('remesa/insertar'), 'Añadir una remesa') ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <td>Año</td>
            <td>Descripción</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listado as $l): ?>
            <tr>
                <td><?= $l->anio ?></td>
                <td><?= $l->descripcion ?></td>
                <td>
                    <?= anchor(site_url('remesa/cambiar/' . $l->idRemesa), 'Modificar') ?>
                    <?= anchor(site_url('remesa/elimina/' . $l->idRemesa), 'Eliminar') ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
