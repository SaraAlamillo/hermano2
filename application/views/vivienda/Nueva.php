    <?= anchor(site_url('vivienda'), 'Volver al listado') ?>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <div class="float-input">
            <?= crearDesplegable('Barriada', $lisBarriada, '', ['nombre' => 'Barriada', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id'], FALSE) ?>
            <span><i class="fa fa-user"></i></span>
        </div>
        <div class="float-input">
            <?= crearDesplegable('Linea', $lisLinea, '', ['nombre' => 'Línea', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
            <span><i class="fa fa-user"></i></span>
        </div>
        <div class="float-input">
            <?= crearDesplegable('Numero', $lisNumero, '', ['nombre' => 'Número', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
            <span><i class="fa fa-user"></i></span>
        </div>
    </div>
    <div class="submit-area">
        <textarea name="Observaciones">Observaciones</textarea>
    </div>
    <input type="submit" id="submit_contact" class="main-button" value="Añadir" />
</form>
