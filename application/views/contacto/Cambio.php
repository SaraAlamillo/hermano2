<h1>Modificar un contacto de la agenda</h1>
<form action="" method="POST" id="contact-form">
     <div class="text-fields">
        <div class="float-input">
            <?= crearDesplegable('tipo', $lisTipo, $contacto->tipo, ['tipo' => 'Tipo de contacto', 'idTipo_Contacto' => ''], ['desc' => 'tipo', 'valor' => 'idTipo_Contacto'], TRUE) ?>
            <span>Tipo de contacto</span>
        </div>
        <fieldset>
            <legend>Datos personales</legend>
            <div class="float-input">
                <input type="text" name="nombre_empresa" placeholder="Empresa" value="<?= $contacto->nombre_empresa ?>" />
                <span>Empresa</span>
            </div>
            <div class="float-input">
                <?= crearDesplegable('tratamiento', $lisTratamiento, $contacto->tratamiento, ['nombre' => 'Tratamiento', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
                <span>Tratamiento</span>
            </div>
            <div class="float-input">
                <input type="text" name="nombre" placeholder="Nombre" value="<?= $contacto->nombre ?>" />
                <span>Nombre</span>
            </div>
            <div class="float-input">
                <input type="text" name="apellido1" placeholder="Primer apellido" value="<?= $contacto->apellido1 ?>" />
                <span>Primer apellido</span>
            </div>
            <div class="float-input">
                <input type="text" name="apellido2" placeholder="Segundo apellido" value="<?= $contacto->apellido2 ?>" />
                <span>Segundo apellido</span>
            </div>
            <div class="float-input">
                <input type="text" name="cif" placeholder="CIF" value="<?= $contacto->cif ?>" />
                <span>CIF</span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <div class="float-input">
                <input type="text" name="movil" placeholder="Teléfono móvil" value="<?= $contacto->movil ?>" />
                <span>Télefono móvil</span>
            </div>
            <div class="float-input">
                <input type="text" name="fijo" placeholder="Teléfono fijo" value="<?= $contacto->fijo ?>" />
                <span>Teléfono fijo</span>
            </div>
            <div class="float-input">
                <input type="text" name="email" placeholder="Correo eléctronico" value="<?= $contacto->email ?>" />
                <span>Correo electrónico</span>
            </div>
        </fieldset>
    </div>
    <div class="submit-area">
        <fieldset>
            <legend>Domicilio</legend>
            <div class="float-input">
                <?= crearDesplegable('tipo_via', $lisTipoVia, $contacto->tipo_via, ['nombre' => 'Tipo de vía', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
                <span>Tipo de vía</span>
            </div>
            <div class="float-input">
                <input type="text" name="direccion" placeholder="Dirección" value="<?= $contacto->direccion ?>" />
                <span>Dirección</span>
            </div>
            <div class="float-input">
                <input type="text" name="numero" placeholder="Número" value="<?= $contacto->numero ?>" />
                <span>Número</span>
            </div>
            <div class="float-input">
                <input type="text" name="piso" placeholder="Piso" value="<?= $contacto->piso ?>" />
                <span>Piso</span>
            </div>
            <div class="float-input">
                <input type="text" name="puerta" placeholder="Puerta" value="<?= $contacto->puerta ?>" />
                <span>Puerta</span>
            </div>
            <div class="float-input">
                <input type="text" name="codigo_postal" placeholder="Código postal" value="<?= $contacto->codigo_postal ?>" />
                <span>Código postal</span>
            </div>
            <div class="float-input">
                <input type="text" name="poblacion" placeholder="Población" value="<?= $contacto->poblacion ?>" />
                <span>Población</span>
            </div>
            <div class="float-input">
                <?= crearDesplegable('provincia', $lisProvincia, $contacto->provincia, ['nombre' => 'Provincia', 'idProvincia' => ''], ['desc' => 'nombre', 'valor' => 'idProvincia'], TRUE) ?>
                <span>Provincia</span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Redes sociales</legend>
            <div class="float-input">
                <input type="text" name="twitter" placeholder="Twitter" value="<?= $contacto->twitter ?>" />
                <span>Twitter</span>
            </div>
            <div class="float-input">
                <input type="text" name="facebook" placeholder="Facebook" value="<?= $contacto->facebook ?>" />
                <span>Facebook</span>
            </div>
            <div class="float-input">
                <input type="text" name="instagram" placeholder="Instagram" value="<?= $contacto->instagram ?>" />
                <span>Instagram</span>
            </div>
        </fieldset>
    </div>
    <input type="submit" value="Modificar" />
</form>
<?= anchor(site_url('contacto'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>
