<?php if (!is_null($alerta)): ?>
    <div class="alert alert-<?= $alerta['tipo'] ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $alerta['mensaje'] ?>
    </div>
<?php endif; ?>

<h1>Listado de viviendas</h1>
<?= anchor(site_url('vivienda/nueva'), '<img alt="Añadir una vivienda" title="Añadir una vivienda" src="' . base_url() . 'assets/images/icons/btnAddVivienda.png" />') ?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Barriada</th>
            <th>Linea</th>
            <th>Numero</th>
            <th>Observaciones</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listado as $l): ?>
            <tr>
                <td><?= $l->Barriada ?></td>
                <td><?= $l->Linea ?></td>
                <td><?= $l->Numero ?></td>
                <td><?= $l->Observaciones ?></td>
                <td><?= anchor('vivienda/cambio/' . $l->idVivienda, '<img alt="Modificar la vivienda" title="Modificar la vivienda" src="' . base_url() . 'assets/images/icons/iconEditar.png" />') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
