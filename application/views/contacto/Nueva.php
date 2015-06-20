<h1>Añadir un nuevo contacto a la agenda</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <div class="float-input">
            <?= crearDesplegable('tipo', $lisTipo, set_value('tipo'), ['tipo' => 'Tipo de contacto', 'idTipo_Contacto' => ''], ['desc' => 'tipo', 'valor' => 'idTipo_Contacto'], TRUE) ?>
            <span>Tipo de contacto</span>
        </div>
        <?= form_error('tipo') ?>
        <fieldset>
            <legend>Datos personales</legend>
            <div class="float-input">
                <input type="text" name="nombre_empresa" placeholder="Empresa" value="<?= set_value('nombre_empresa') ?>" />
                <span>Empresa</span>
            </div>
            <?= form_error('nombre_empresa') ?>
            <div class="float-input">
                <?= crearDesplegable('tratamiento', $lisTratamiento, set_value('tratamiento'), ['nombre' => 'Tratamiento', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
                <span>Tratamiento</span>
            </div>
            <?= form_error('tratamiento') ?>
            <div class="float-input">
                <input type="text" name="nombre" placeholder="Nombre" value="<?= set_value('nombre') ?>" />
                <span>Nombre</span>
            </div>
            <?= form_error('nombre') ?>
            <div class="float-input">
                <input type="text" name="apellido1" placeholder="Primer apellido" value="<?= set_value('apellido1') ?>" />
                <span>Primer apellido</span>
            </div>
            <?= form_error('apellido1') ?>
            <div class="float-input">
                <input type="text" name="apellido2" placeholder="Segundo apellido" value="<?= set_value('apellido2') ?>" />
                <span>Segundo apellido</span>
            </div>
            <?= form_error('apellido2') ?>
            <div class="float-input">
                <input type="text" name="cif" placeholder="CIF" value="<?= set_value('cif') ?>" />
                <span>CIF</span>
            </div>
            <?= form_error('cif') ?>
        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <div class="float-input">
                <input type="text" name="movil" placeholder="Teléfono móvil" value="<?= set_value('movil') ?>" />
                <span>Télefono móvil</span>
            </div>
            <?= form_error('movil') ?>
            <div class="float-input">
                <input type="text" name="fijo" placeholder="Teléfono fijo" value="<?= set_value('fijo') ?>" />
                <span>Teléfono fijo</span>
            </div>
            <?= form_error('fijo') ?>
            <div class="float-input">
                <input type="text" name="email" placeholder="Correo eléctronico" value="<?= set_value('email') ?>" />
                <span>Correo electrónico</span>
            </div>
            <?= form_error('email') ?>
        </fieldset>
    </div>
    <div class="submit-area">
        <fieldset>
            <legend>Domicilio</legend>
            <div class="float-input">
                <?= crearDesplegable('tipo_via', $lisTipoVia, set_value('tipo_via'), ['nombre' => 'Tipo de vía', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
                <span>Tipo de vía</span>
            </div>
            <?= form_error('tipo_via') ?>
            <div class="float-input">
                <input type="text" name="direccion" placeholder="Dirección" value="<?= set_value('direccion') ?>" />
                <span>Dirección</span>
            </div>
            <?= form_error('direccion') ?>
            <div class="float-input">
                <input type="text" name="numero" placeholder="Número" value="<?= set_value('numero') ?>" />
                <span>Número</span>
            </div>
            <?= form_error('numero') ?>
            <div class="float-input">
                <input type="text" name="piso" placeholder="Piso" value="<?= set_value('piso') ?>" />
                <span>Piso</span>
            </div>
            <?= form_error('piso') ?>
            <div class="float-input">
                <input type="text" name="puerta" placeholder="Puerta" value="<?= set_value('puerta') ?>" />
                <span>Puerta</span>
            </div>
            <?= form_error('puerta') ?>
            <div class="float-input">
                <input type="text" name="codigo_postal" placeholder="Código postal" value="<?= set_value('codigo_postal') ?>" />
                <span>Código postal</span>
            </div>
            <?= form_error('codigo_postal') ?>
            <div class="float-input">
                <input type="text" name="poblacion" placeholder="Población" value="<?= set_value('poblacion') ?>" />
                <span>Población</span>
            </div>
            <?= form_error('poblacion') ?>
            <div class="float-input">
                <?= crearDesplegable('provincia', $lisProvincia, set_value('provincia'), ['nombre' => 'Provincia', 'idProvincia' => ''], ['desc' => 'nombre', 'valor' => 'idProvincia'], TRUE) ?>
                <span>Provincia</span>
            </div>
            <?= form_error('provincia') ?>
        </fieldset>
        <fieldset>
            <legend>Redes sociales</legend>
            <div class="float-input">
                <input type="text" name="twitter" placeholder="Twitter" value="<?= set_value('twitter') ?>" />
                <span>Twitter</span>
            </div>
            <?= form_error('twitter') ?>
            <div class="float-input">
                <input type="text" name="facebook" placeholder="Facebook" value="<?= set_value('facebook') ?>" />
                <span>Facebook</span>
            </div>
            <?= form_error('facebook') ?>
            <div class="float-input">
                <input type="text" name="instagram" placeholder="Instagram" value="<?= set_value('instagram') ?>" />
                <span>Instagram</span>
            </div>
            <?= form_error('instagram') ?>
        </fieldset>
    </div>
    <input type="submit" value="Añadir" />
</form>
<?= anchor(site_url('contacto'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>
