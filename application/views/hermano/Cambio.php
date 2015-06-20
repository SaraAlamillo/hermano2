<h1>Modificar los datos de un hermano</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <fieldset>
            <div class="float-input">
                <?= crearDesplegable('familia', $lisFamilia, set_value('familia', $hermano->familia), ['nombre' => 'Familia', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
                <span>Familia</span>
            </div>
        <?= form_error('familia') ?>
            <div class="float-input">
                <?= crearDesplegable('vivienda', $viviendas, set_value('vivienda', $hermano->vivienda), ['nombre' => 'Vivienda', 'id' => '']) ?>
                <span>Vivienda</span>
            </div>
        <?= form_error('vivienda') ?>
            <div class="float-input">
                <div class="radioButton">
                    <?= crearListaRadio('medalla', [['nombre' => 'Si', 'id' => '1'], ['nombre' => 'No', 'id' => '0']], $hermano->medalla) ?>
                </div>
                <span>Medalla</span>
            </div>
        <?= form_error('medalla') ?>
            <fieldset>
                <legend>Datos personales</legend>
                <div class="float-input">
                    <?= crearDesplegable('tratamiento', $lisTratamiento, set_value('tratamiento', $hermano->tratamiento) , ['nombre' => 'Tratamiento', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
                    <span>Tratamiento</span>
                </div>
        <?= form_error('tratamiento') ?>
                <div class="float-input">
                    <input type="text" name="nombre" placeholder="Nombre" value="<?= set_value('nombre', $hermano->nombre) ?>" />
                    <span>Nombre</span>
                </div>
        <?= form_error('nombre') ?>
                <div class="float-input">
                    <input type="text" name="apellido1" placeholder="Primer apellido" value="<?= set_value('apellido1', $hermano->apellido1) ?>" />
                    <span>Primer apellido</span>
                </div>
        <?= form_error('apellido1') ?>
                <div class="float-input">
                    <input type="text" name="apellido2" placeholder="Segundo apellido" value="<?= set_value('apellido2', $hermano->apellido2) ?>" />
                    <span>Segundo apellido</span>
                </div>
        <?= form_error('apellido2') ?>
                <div class="float-input">
                    <input type="text" name="dni" placeholder="DNI" value="<?= set_value('dni', $hermano->dni) ?>"  /></p>
                    <span>DNI</span>
                </div>
        <?= form_error('dni') ?>
            </fieldset>
            <fieldset>
                <legend>Contacto</legend>
                <div class="float-input">
                    <input type="text" name="movil" placeholder="Móvil" value="<?= set_value('movil', $hermano->movil) ?>" />
                    <span>Teléfono móvil</span>
                </div>
        <?= form_error('movil') ?>
                <div class="float-input">
                    <input type="text" name="fijo" placeholder="Fijo" value="<?= set_value('fijo', $hermano->fijo)  ?>" />
                    <span>Teléfono fijo</span>
                </div>
        <?= form_error('fijo') ?>
                <div class="float-input">
                    <input type="text" name="email" placeholder="Email" value="<?= set_value('email', $hermano->email) ?>" />
                    <span>Email</span>
                </div>
        <?= form_error('email') ?>
            </fieldset>
            <fieldset>
                <legend>Pago de cuotas</legend>
                <div class="float-input">
                    <?= crearDesplegable('tipo', $lisTipoPago, set_value('tipo', $hermano->tipo), ['nombre' => 'Tipo de pago', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
                    <span>Tipo de pago</span>
                </div>
        <?= form_error('tipo') ?>
                <div class="float-input">
                    <input type="text" name="cuenta_corriente" placeholder="Cuenta corriente" value="<?= set_value('cuenta_corriente', $hermano->cuenta_corriente) ?>" />
                    <span>Cuenta corriente</span>
                </div>
        <?= form_error('cuenta_corriente') ?>
            </fieldset>
    </div>
    <div class="submit-area">
        <legend>Residencia habitual</legend>
        <div class="float-input">
            <?= crearDesplegable('tipo_via', $lisTipoVia, set_value('tipo_via', $hermano->tipo_via), ['nombre' => 'Tipo de vía', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
            <span>Tipo de vía</span>
        </div>
        <?= form_error('tipo_via') ?>
        <div class="float-input">
            <input type="text" name="direccion" placeholder="Dirección" value="<?= set_value('direccion', $hermano->direccion) ?>" />
            <span>Dirección</span>
        </div>
        <?= form_error('dirrecion') ?>
        <div class="float-input">
            <input type="text" name="numero" placeholder="Número" value="<?= set_value('numero', $hermano->numero)  ?>" />
            <span>Número</span>
        </div>
        <?= form_error('numero') ?>
        <div class="float-input">
            <input type="text" name="piso" placeholder="Piso" value="<?=set_value('piso', $hermano->piso) ?>"  />
            <span>Piso</span>
        </div>
        <?= form_error('piso') ?>
        <div class="float-input">
            <input type="text" name="puerta" placeholder="Puerta" value="<?=set_value('puerta', $hermano->puerta) ?>" />
            <span>Puerta</span>
        </div>
        <?= form_error('puerta') ?>
        <div class="float-input">
            <input type="text" name="codigo_postal" placeholder="Código postal" value="<?=set_value('codigo_postal', $hermano->codigo_postal) ?>" />
            <span>Código postal</span>
        </div>
        <?= form_error('codigo_postal') ?>
        <div class="float-input">
            <input type="text" name="poblacion" placeholder="Población" value="<?=set_value('poblacion', $hermano->poblacion) ?>" />
            <span>Población</span>
        </div>
        <?= form_error('poblacion') ?>
        <div class="float-input">
            <?= crearDesplegable('provincia', $lisProvincia, set_value('provincia', $hermano->provincia), ['nombre' => 'Provincia', 'idProvincia' => ''], ['desc' => 'nombre', 'valor' => 'idProvincia'], TRUE) ?>
            <span>Provincia</span>
        </div>
        <?= form_error('provincia') ?>
        </fieldset>
        <fieldset>
            <legend>Redes sociales</legend>
            <div class="float-input">
                <input type="text" name="twitter" placeholder="Twitter" value="<?=set_value('twitter', $hermano->twitter) ?>" />
                <span>Twitter</span>
            </div>
        <?= form_error('twitter') ?>
            <div class="float-input">
                <input type="text" name="facebook" placeholder="Facebook" value="<?=set_value('facebook', $hermano->facebook) ?>" />
                <span>Facebook</span>
            </div>
        <?= form_error('facebook') ?>
            <div class="float-input">
                <input type="text" name="instagram" placeholder="Instagram" value="<?=set_value('instagram', $hermano->instagram) ?>" />
                <span>Instagram</span>
            </div>
        <?= form_error('instagram') ?>
        </fieldset>
        <input type="submit" value="Modificar" />
    </div>
</form>
<?= anchor(site_url('hermano'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>



