<?php if (!is_null($alerta)): ?>
    <div class="alert alert-<?= $alerta['tipo'] ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $alerta['mensaje'] ?>
    </div>
<?php endif; ?>
<h1>Listado de pagos de <?= $listado[0]->nombre . ' ' . $listado[0]->apellido1 . ' ' . $listado[0]->apellido2 ?></h1>
<?php if ($rolActual == 'Administrador') : ?>
    <?= anchor(site_url('Pago/registra/' . $listado[0]->idHermano), '<img alt="Registrar un pago" title="Registrar un pago" src="' . base_url() . 'assets/images/icons/btnAddPago.png" />') ?>
<?php endif; ?>
<div class="table-responsive">
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
                <?php if (empty($l->cuota1) || empty($l->cuota2)): ?>
                    <tr class="danger">
                    <?php else: ?>
                    <tr class="success">
                    <?php endif; ?>
                    <td><?= $l->anio ?></td>
                    <td><?= $l->descripcion ?></td>
                    <?php if (empty($l->cuota1)): ?>
                        <td>NO PAGADO</td>
                    <?php else: ?>
                        <td><?= $l->cuota1 ?></td>
                    <?php endif; ?>
                    <?php if (empty($l->cuota2)): ?>
                        <td>NO PAGADO</td>
                    <?php else: ?>
                        <td><?= $l->cuota2 ?></td>
                    <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $paginador ?>
<?= anchor(site_url('hermano'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>
