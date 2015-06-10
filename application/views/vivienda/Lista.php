<?php if (!is_null($mensaje)): ?>
    <p><?= $mensaje ?></p>
<?php endif; ?>
<h1>Listado de viviendas</h1>
<?= anchor(site_url('vivienda/nueva'), 'Añadir una vivienda') ?>
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
                <td><?= anchor('vivienda/cambio/' . $l->idVivienda, 'Modificar') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
