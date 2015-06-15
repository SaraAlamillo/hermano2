<?= anchor(site_url('constructor/constructor'), 'Realizar otra consulta') ?>
<table border="1">
    <tr>
        <?php foreach ($resultado[0] as $clave => $valor): ?>
            <td><?= nombresCampos($clave) ?></td>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($resultado as $registro): ?>
        <tr>
            <?php foreach ($registro as $campo): ?>
                <td><?= $campo ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
