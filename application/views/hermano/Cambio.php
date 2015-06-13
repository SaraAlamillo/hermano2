<h1>Modificar los datos de un hermano</h1>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <fieldset>
            <div class="float-input">
                <?= crearDesplegable('familia', $lisFamilia, $hermano->familia, ['nombre' => 'Familia', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
                <span>Familia</span>
            </div>
            <div class="float-input">
                <?= crearDesplegable('vivienda', $viviendas, $hermano->vivienda, ['nombre' => 'Vivienda', 'id' => '']) ?>
                <span>Vivienda</span>
            </div>
            <div class="float-input">
                <div class="radioButton">
                    <?= crearListaRadio('medalla', [['nombre' => 'Si', 'id' => '1'], ['nombre' => 'No', 'id' => '0']], $hermano->medalla) ?>
                </div>
                <span>Medalla</span>
            </div>
            <fieldset>
                <legend>Datos personales</legend>
                <div class="float-input">
                    <?= crearDesplegable('tratamiento', $lisTratamiento, $hermano->tratamiento, ['nombre' => 'Tratamiento', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
                    <span>Tratamiento</span>
                </div>
                <div class="float-input">
                    <input type="text" name="nombre" placeholder="Nombre" value="<?= $hermano->nombre ?>" />
                    <span>Nombre</span>
                </div>
                <div class="float-input">
                    <input type="text" name="apellido1" placeholder="Primer apellido" value="<?= $hermano->apellido1 ?>" />
                    <span>Primer apellido</span>
                </div>
                <div class="float-input">
                    <input type="text" name="apellido2" placeholder="Segundo apellido" value="<?= $hermano->apellido2 ?>" />
                    <span>Segundo apellido</span>
                </div>
                <div class="float-input">
                    <input type="text" name="dni" placeholder="DNI" value="<?= $hermano->dni ?>"  /></p>
                    <span>DNI</span>
                </div>
            </fieldset>
            <fieldset>
                <legend>Contacto</legend>
                <div class="float-input">
                    <input type="text" name="movil" placeholder="Móvil" value="<?= $hermano->movil ?>" />
                    <span>Teléfono móvil</span>
                </div>
                <div class="float-input">
                    <input type="text" name="fijo" placeholder="Fijo" value="<?= $hermano->fijo ?>" />
                    <span>Teléfono fijo</span>
                </div>
                <div class="float-input">
                    <input type="text" name="email" placeholder="Email" value="<?= $hermano->email ?>" />
                    <span>Email</span>
                </div>
            </fieldset>
            <fieldset>
                <legend>Pago de cuotas</legend>
                <div class="float-input">
                    <?= crearDesplegable('tipo', $lisTipoPago, $hermano->tipo, ['nombre' => 'Tipo de pago', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
                    <span>Tipo de pago</span>
                </div>
                <div class="float-input">
                    <input type="text" name="cuenta_corriente" placeholder="Cuenta corriente" value="<?= $hermano->cuenta_corriente ?>" />
                    <span>Cuenta corriente</span>
                </div>
            </fieldset>
    </div>
    <div class="submit-area">
        <legend>Residencia habitual</legend>
        <div class="float-input">
            <?= crearDesplegable('tipo_via', $lisTipoVia, $hermano->tipo_via, ['nombre' => 'Tipo de vía', 'id' => ''], ['desc' => 'nombre', 'valor' => 'id']) ?>
            <span>Tipo de vía</span>
        </div>
        <div class="float-input">
            <input type="text" name="direccion" placeholder="Dirección" value="<?= $hermano->direccion ?>" />
            <span>Dirección</span>
        </div>
        <div class="float-input">
            <input type="text" name="numero" placeholder="Número" value="<?= $hermano->numero ?>" />
            <span>Número</span>
        </div>
        <div class="float-input">
            <input type="text" name="piso" placeholder="Piso" value="<?= $hermano->piso ?>" />
            <span>Piso</span>
        </div>
        <div class="float-input">
            <input type="text" name="puerta" placeholder="Puerta" value="<?= $hermano->puerta ?>" />
            <span>Puerta</span>
        </div>
        <div class="float-input">
            <input type="text" name="codigo_postal" placeholder="Código postal" value="<?= $hermano->codigo_postal ?>" />
            <span>Código postal</span>
        </div>
        <div class="float-input">
            <input type="text" name="poblacion" placeholder="Población" value="<?= $hermano->poblacion ?>" />
            <span>Población</span>
        </div>
        <div class="float-input">
            <?= crearDesplegable('provincia', $lisProvincia, $hermano->provincia, ['nombre' => 'Provincia', 'idProvincia' => ''], ['desc' => 'nombre', 'valor' => 'idProvincia'], TRUE) ?>
            <span>Provincia</span>
        </div>
        </fieldset>
        <fieldset>
            <legend>Redes sociales</legend>
            <div class="float-input">
                <input type="text" name="twitter" placeholder="Twitter" value="<?= $hermano->twitter ?>" />
                <span>Twitter</span>
            </div>
            <div class="float-input">
                <input type="text" name="facebook" placeholder="Facebook" value="<?= $hermano->facebook ?>" />
                <span>Facebook</span>
            </div>
            <div class="float-input">
                <input type="text" name="instagram" placeholder="Instagram" value="<?= $hermano->instagram ?>" />
                <span>Instagram</span>
            </div>
        </fieldset>
        <input type="submit" value="Modificar" />
    </div>
</form>
<?= anchor(site_url('hermano'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>



