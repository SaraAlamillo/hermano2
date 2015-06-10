    <?= anchor(site_url('contacto'), 'Volver al listado') ?>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <fieldset>
            <legend>Empresa</legend> 
            <div class="float-input"><input type="text" name="nombre_empresa" value="<?= $contacto->nombre_empresa ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Tratamiento</legend> 
            <div class="float-input">
                <?= crearDesplegable('tratamiento', $lisTratamiento, $contacto->tratamiento, NULL, ['desc' => 'nombre', 'valor' => 'id']) ?>
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Nombre</legend> 
            <div class="float-input">
                <input type="text" name="nombre" value="<?= $contacto->nombre ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Primer apellido</legend> 
            <div class="float-input">
                <input type="text" name="apellido1" value="<?= $contacto->apellido1 ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Segundo apellido</legend> 
            <div class="float-input">
                <input type="text" name="apellido2" value="<?= $contacto->apellido2 ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>CIF</legend> 
            <div class="float-input">
                <input type="text" name="cif" value="<?= $contacto->cif ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Tipo de vía</legend> 
            <div class="float-input">
                <?= crearDesplegable('tipo_via', $lisTipoVia, $contacto->tipo_via, NULL, ['desc' => 'nombre', 'valor' => 'id']) ?>
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Dirección</legend> 
            <div class="float-input">
                <input type="text" name="direccion" value="<?= $contacto->direccion ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Número</legend> 
            <div class="float-input">
                <input type="text" name="numero" value="<?= $contacto->numero ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Piso</legend> 
            <div class="float-input">
                <input type="text" name="piso" value="<?= $contacto->piso ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Puerta</legend> 
            <div class="float-input">
                <input type="text" name="puerta" value="<?= $contacto->puerta ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Código postal</legend> 
            <div class="float-input">
                <input type="text" name="codigo_postal" value="<?= $contacto->codigo_postal ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Población</legend> 
            <div class="float-input">
                <input type="text" name="poblacion" value="<?= $contacto->poblacion ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Móvil</legend> 
            <div class="float-input">
                <input type="text" name="movil" value="<?= $contacto->movil ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Fijo</legend> 
            <div class="float-input">
                <input type="text" name="fijo" value="<?= $contacto->fijo ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Email</legend> 
            <div class="float-input">
                <input type="text" name="email" value="<?= $contacto->email ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Twitter</legend> 
            <div class="float-input">
                <input type="text" name="twitter" value="<?= $contacto->twitter ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Facebook</legend> 
            <div class="float-input">
                <input type="text" name="facebook" value="<?= $contacto->facebook ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Instagram</legend> 
            <div class="float-input">
                <input type="text" name="instagram" value="<?= $contacto->instagram ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Tipo</legend> 
            <div class="float-input">
                <?= crearDesplegable('tipo', $lisTipo, $contacto->tipo, NULL, ['desc' => 'tipo', 'valor' => 'idTipo_Contacto'], TRUE) ?>
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Provincia</legend> 
            <div class="float-input">
                <?= crearDesplegable('provincia', $lisProvincia, $contacto->provincia, NULL, ['desc' => 'nombre', 'valor' => 'idProvincia'], TRUE) ?>
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
    </div>
    <input type="submit" value="Modificar" />
</form>

