<h1>Registro de pagos</h1>
<form action="" method="POST" id="contact-form">
    <div class="float-input">
        <?= crearDesplegable('hermano', $hermanos, $seleccionado['hermano'], ['nombre' => 'Hermano', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id'], FALSE, "id='rpHermano'") ?>
        <span>Nombre completo</span>
    </div>
    <?php if ($seleccionado['hermano'] != ''): ?>
        <div class="float-input">
            <?= crearDesplegable('anio', $anios, $seleccionado['anio'], ['anio' => 'Año'], ['desc' => 'anio', 'valor' => 'anio'], TRUE, "id='rpAnio'") ?>
            <span>Año</span>
        </div>
        <?php if ($seleccionado['anio'] != 'Año'): ?>
            <div class="float-input">
                <?= crearDesplegable('descripcion', $descripciones, $seleccionado['descripcion'], ['descripcion' => 'Remesa', 'idRemesa' => ''], ['desc' => 'descripcion', 'valor' => 'idRemesa'], TRUE, "id='rpDescripcion'") ?>
                <span>Remesa</span>
            </div>
            <?php if ($seleccionado['descripcion'] != ''): ?>
                <fieldset>
                    <legend>Plazos</legend>
                    <div class="float-input">
                        <input type="text" name="cuota1" value="<?= $seleccionado['cuota1'] ?>" />
                        <span>Cuota 1</span>
                    </div>
                    <div class="float-input">
                        <input type="text" name="cuota2" value="<?= $seleccionado['cuota2'] ?>" />
                        <span>Cuota 2</span>
                    </div>
                </fieldset>
                <input type="submit" value="Registrar" />
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
</form>