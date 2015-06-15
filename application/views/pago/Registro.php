<?php if (!is_null($alerta)): ?>
    <div class="alert alert-<?= $alerta['tipo'] ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= $alerta['mensaje'] ?>
    </div>
<?php endif; ?>

<h1>Registro de pagos</h1>
<form action="" method="POST" id="contact-form">
    <div class="float-input">
        <?= crearDesplegable('hermano', $hermanos, $seleccionado['hermano'], ['nombre' => 'Hermano', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id'], FALSE, "id='rpHermano' onchange='redirect()'") ?>
        <span>Nombre completo</span>
    </div>
    <?php if ($seleccionado['hermano'] != ''): ?>
        <div class="float-input">
            <?= crearDesplegable('anio', $anios, $seleccionado['anio'], ['anio' => 'Año'], ['desc' => 'anio', 'valor' => 'anio'], TRUE, "id='rpAnio' onchange='redirect()'") ?>
            <span>Año</span>
        </div>
        <?php if ($seleccionado['anio'] != 'Año'): ?>
            <div class="float-input">
                <?= crearDesplegable('descripcion', $descripciones, $seleccionado['descripcion'], ['descripcion' => 'Remesa', 'idRemesa' => ''], ['desc' => 'descripcion', 'valor' => 'idRemesa'], TRUE, "id='rpDescripcion' onchange='redirect()'") ?>
                <span>Remesa</span>
            </div>
            <?php if ($seleccionado['descripcion'] != ''): ?>
                <fieldset>
                    <legend>Plazos</legend>
                    <div class="float-input">
                        <?php if ($seleccionado['cuota1'] == NULL) : ?>
                            <input type="date" name="cuota1" class="danger" />
                        <?php else: ?>
                            <input type="date" readonly="readonly" value="<?= $seleccionado['cuota1'] ?>" class="success" />
                        <?php endif; ?>
                        <span>Cuota 1</span>
                    </div>
                    <div class="float-input">
                        <?php if ($seleccionado['cuota2'] == NULL) : ?>
                            <input type="date" name="cuota2" class="danger" />
                        <?php else: ?>
                            <input type="date" readonly="readonly" value="<?= $seleccionado['cuota2'] ?>" class="success" />
                        <?php endif; ?>
                        <span>Cuota 2</span>
                    </div>
                </fieldset>
                <input type="submit" value="Registrar" />
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
</form>
<script>
    function redirect() {
        var urlActual = window.location.href;
        var urlNueva = '';

        var hermanos = document.getElementById('rpHermano');
        var selHermano = '';
        if (hermanos !== null) {
            selHermano = hermanos.options[hermanos.selectedIndex].value;
        }

        var anios = document.getElementById('rpAnio');
        var selAnio = '';
        if (anios !== null) {
            selAnio = anios.options[anios.selectedIndex].value;
        }

        var remesas = document.getElementById('rpDescripcion');
        var selRemesa = '';
        if (remesas !== null) {
            selRemesa = remesas.options[remesas.selectedIndex].value;
        }

        urlNueva = urlActual.substring(0, urlActual.indexOf('registra')) + 'registra/';

        if (selHermano !== '') {
            urlNueva += selHermano + '/';
        }

        if (selAnio !== '') {
            urlNueva += selAnio + '/';
        }

        if (selRemesa !== '') {
            urlNueva += selRemesa + '/';
        }

        window.location.href = urlNueva;
    }
</script>