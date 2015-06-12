<?= anchor(site_url('hermano'), 'Volver al listado') ?>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <div class="float-input">
            <?= crearDesplegable('vivienda', $viviendas, '', ['nombre' => 'Vivienda', 'id' => '']) ?>
            <span><i class="fa">Vivienda</i></span>
        </div>
        <div class="float-input">
            <?= crearDesplegable('tratamiento', $lisTratamiento, '', ['nombre' => 'Tratamiento', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
            <span><i class="fa">Tratamiento</i></span>
        </div>
        <div class="float-input">
            <input type="text" name="nombre" placeholder="Nombre" />
            <span><i class="fa">Nombre</i></span>
        </div>
        <div class="float-input">
            <input type="text" name="apellido1" placeholder="Primer apellido" />
            <span><i class="fa">Primer apellido</i></span>
        </div>
        <div class="float-input">
            <input type="text" name="apellido2" placeholder="Segundo apellido" />
            <span><i class="fa">Segundo apellido</i></span>
        </div>
        <div class="float-input">
            <input type="text" name="dni" placeholder="DNI" /></p>
            <span><i class="fa">DNI</i></span>
        </div>
        <div class="float-input">
            <?= crearDesplegable('tipo_via', $lisTipoVia, '', ['nombre' => 'Tipo de vía', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
            <span><i class="fa">Tipo de vía</i></span>
        </div>
        <div class="float-input">
            <input type="text" name="direccion" placeholder="Dirección" />
            <span><i class="fa">Dirección</i></span>
        </div>
        <div class="float-input">
            <input type="text" name="numero" placeholder="Número" />
            <span><i class="fa">Número</i></span>
        </div>
        <div class="float-input">
            <input type="text" name="piso" placeholder="Piso" />
            <span><i class="fa">Piso</i></span>
        </div>
        <div class="float-input">
            <input type="text" name="puerta" placeholder="Puerta" />
            <span><i class="fa">Puerta</i></span>
        </div>
        <div class="float-input">
            <input type="text" name="codigo_postal" placeholder="Código postal" />
            <span><i class="fa">Código postal</i></span>
        </div>
        <div class="float-input">
            <input type="text" name="poblacion" placeholder="Población" />
            <span><i class="fa">Población</i></span>
        </div>
        <div class="float-input">
            <input type="text" name="movil" placeholder="Móvil" />
            <span><i class="fa">Móvil</i></span>
        </div>
        <div class="float-input">
            <input type="text" name="fijo" placeholder="Fijo" />
            <span><i class="fa">Fijo</span>
        </div>
        <div class="float-input">
            <input type="text" name="email" placeholder="Email" />
            <span><i class="fa">Email</span>
        </div>
        <div class="float-input">
            <input type="text" name="twitter" placeholder="Twitter" />
            <span><i class="fa">Twitter</span>
        </div>
        <div class="float-input">
            <input type="text" name="facebook" placeholder="Facebook" />
            <span><i class="fa">Facebook</span>
        </div>
        <div class="float-input">
            <input type="text" name="instagram" placeholder="Instagram" />
            <span><i class="fa">Instagram</span>
        </div>
        <div class="float-input">
            <?= crearDesplegable('provincia', $lisProvincia, '', ['nombre' => 'Provincia', 'idProvincia' => ''], ['desc' => 'nombre', 'valor' => 'idProvincia'], TRUE) ?>
            <span><i class="fa">Provincia</span>
        </div>
        <div class="float-input">
            <?= crearDesplegable('tipo', $lisTipoPago, '', ['nombre' => 'Tipo de pago', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
            <span><i class="fa">Tipo de pago</span>
        </div>
        <div class="float-input">
            <input type="text" name="cuenta_corriente" placeholder="Cuenta corriente" />
            <span><i class="fa">Cuenta corriente</span>
        </div>
        <div class="float-input">
            <?= crearDesplegable('familia', $lisFamilia, '', ['nombre' => 'Familia', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
            <span><i class="fa">Familia</i></span>
        </div>
    </div>
    <input type="submit" value="Añadir" />
</form>
