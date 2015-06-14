<h1>Añadir un nuevo contacto a la agenda</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <div class="float-input">
            <?= crearDesplegable('tipo', $lisTipo, '', ['tipo' => 'Tipo de contacto', 'idTipo_Contacto' => ''], ['desc' => 'tipo', 'valor' => 'idTipo_Contacto'], TRUE) ?>
            <span>Tipo de contacto</span>
        </div>
        <fieldset>
            <legend>Datos personales</legend>
            <div class="float-input">
                <input type="text" name="nombre_empresa" placeholder="Empresa" />
                <span>Empresa</span>
            </div>
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
                <input type="text" name="cif" placeholder="CIF" />
                <span>CIF</span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <div class="float-input">
                <input type="text" name="movil" placeholder="Teléfono móvil" />
                <span>Télefono móvil</span>
            </div>
            <div class="float-input">
                <input type="text" name="fijo" placeholder="Teléfono fijo" />
                <span>Teléfono fijo</span>
            </div>
            <div class="float-input">
                <input type="text" name="email" placeholder="Correo eléctronico" />
                <span>Correo electrónico</span>
            </div>
        </fieldset>
    </div>
    <div class="submit-area">
        <fieldset>
            <legend>Domicilio</legend>
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
    </div>
    <input type="submit" value="Añadir" />
</form>
<?= anchor(site_url('contacto'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>
