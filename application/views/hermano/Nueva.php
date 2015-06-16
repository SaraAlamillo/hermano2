<h1>Dar de alta a un nuevo hermano</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <div class="float-input">
            <?= crearDesplegable('familia', $lisFamilia, '', ['nombre' => 'Familia', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
            <span>Familia</span>
        </div>
        <div class="float-input">
            <?= crearDesplegable('vivienda', $viviendas, '', ['nombre' => 'Vivienda', 'id' => '']) ?>
            <span>Vivienda</span>
        </div>
        <fieldset>
            <fieldset>
                <legend>Datos personales</legend>
                <div class="float-input">
                    <?= crearDesplegable('tratamiento', $lisTratamiento, '', ['nombre' => 'Tratamiento', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
                    <span>Tratamiento</span>
                </div>
                <div class="float-input">
                    <input type="text" name="nombre" placeholder="Nombre" />
                    <span>Nombre</span>
                </div>
                <div class="float-input">
                    <input type="text" name="apellido1" placeholder="Primer apellido" />
                    <span>Primer apellido</span>
                </div>
                <div class="float-input">
                    <input type="text" name="apellido2" placeholder="Segundo apellido" />
                    <span>Segundo apellido</span>
                </div>
                <div class="float-input">
                    <input type="text" name="dni" placeholder="DNI" /></p>
                    <span>DNI</span>
                </div>
            </fieldset>
            <fieldset>
                <legend>Contacto</legend>
                <div class="float-input">
                    <input type="text" name="movil" placeholder="Móvil" />
                    <span>Teléfono móvil</span>
                </div>
                <div class="float-input">
                    <input type="text" name="fijo" placeholder="Fijo" />
                    <span>Teléfono fijo</span>
                </div>
                <div class="float-input">
                    <input type="text" name="email" placeholder="Email" />
                    <span>Email</span>
                </div>
            </fieldset>
            <fieldset>
                <legend>Pago de cuotas</legend>
                <div class="float-input">
                    <?= crearDesplegable('tipo', $lisTipoPago, '', ['nombre' => 'Tipo de pago', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
                    <span>Tipo de pago</span>
                </div>
                <div class="float-input">
                    <input type="text" name="cuenta_corriente" placeholder="Cuenta corriente" />
                    <span>Cuenta corriente</span>
                </div>
            </fieldset>
    </div>
    <div class="submit-area">
        <legend>Residencia habitual</legend>
        <div class="float-input">
            <?= crearDesplegable('tipo_via', $lisTipoVia, '', ['nombre' => 'Tipo de vía', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
            <span>Tipo de vía</span>
        </div>
        <div class="float-input">
            <input type="text" name="direccion" placeholder="Dirección" />
            <span>Dirección</span>
        </div>
        <div class="float-input">
            <input type="text" name="numero" placeholder="Número" />
            <span>Número</span>
        </div>
        <div class="float-input">
            <input type="text" name="piso" placeholder="Piso" />
            <span>Piso</span>
        </div>
        <div class="float-input">
            <input type="text" name="puerta" placeholder="Puerta" />
            <span>Puerta</span>
        </div>
        <div class="float-input">
            <input type="text" name="codigo_postal" placeholder="Código postal" />
            <span>Código postal</span>
        </div>
        <div class="float-input">
            <input type="text" name="poblacion" placeholder="Población" />
            <span>Población</span>
        </div>
        <div class="float-input">
            <?= crearDesplegable('provincia', $lisProvincia, '', ['nombre' => 'Provincia', 'idProvincia' => ''], ['desc' => 'nombre', 'valor' => 'idProvincia'], TRUE) ?>
            <span>Provincia</span>
        </div>
        </fieldset>
        <fieldset>
            <legend>Redes sociales</legend>
            <div class="float-input">
                <input type="text" name="twitter" placeholder="Twitter" />
                <span>Twitter</span>
            </div>
            <div class="float-input">
                <input type="text" name="facebook" placeholder="Facebook" />
                <span>Facebook</span>
            </div>
            <div class="float-input">
                <input type="text" name="instagram" placeholder="Instagram" />
                <span>Instagram</span>
            </div>
        </fieldset>
        <input type="submit" value="Añadir" />
    </div>
</form>
<?= anchor(site_url('hermano'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>
