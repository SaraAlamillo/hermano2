<h1>Dar de alta una vivienda</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <div class="float-input">
            <?= crearDesplegable('Barriada', $lisBarriada, '', ['nombre' => 'Barriada', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id'], FALSE) ?>
            <span>Barriada</span>
        </div>
        <div class="float-input">
            <?= crearDesplegable('Linea', $lisLinea, '', ['nombre' => 'Línea', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
            <span>Línea</span>
        </div>
        <div class="float-input">
            <?= crearDesplegable('Numero', $lisNumero, '', ['nombre' => 'Número', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
            <span>Número</span>
        </div>
    </div>
    <div class="submit-area">
        <textarea name="Observaciones" placeholder="Observaciones"></textarea>
        <input type="submit" id="submit_contact" class="main-button" value="Añadir" />
    </div>
</form>
<?= anchor(site_url('vivienda'), '<img title="Volver al listado" alt="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png"') ?>
