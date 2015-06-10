<form action="" method="POST">
    <?php foreach ($campos as $clave => $valor): ?>
        <fieldset>
            <legend>Tabla de <?= $clave ?></legend>
            <?php foreach ($valor as $v): ?>
                <input type="checkbox" name="<?= $clave ?>[]" value="<?= $clave . '.' . $v ?>" /> <?= nombresCampos($v) ?> <br />
            <?php endforeach; ?>
        </fieldset>
    <?php endforeach; ?>
    <input type="submit" value="Ejecutar consulta" />
</form>
