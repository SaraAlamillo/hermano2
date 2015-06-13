<?= anchor(site_url('hermano'), 'Volver al listado') ?>
<form action="" method="POST" id="contact-form">
    <div class="text-fields">
        <fieldset>
            <legend>Vivienda</legend> 
            <div class="float-input">
                <?= crearDesplegable('vivienda', $viviendas, $hermano->vivienda) ?>
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Tratamiento</legend> 
            <div class="float-input">
                <?= crearDesplegable('tratamiento', $lisTratamiento, $hermano->tratamiento, NULL, ['desc' => 'nombre', 'valor' => 'id']) ?>
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Nombre</legend> 
            <div class="float-input">
                <input type="text" name="nombre" value="<?= $hermano->nombre ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Primer apellido</legend> 
            <div class="float-input">
                <input type="text" name="apellido1" value="<?= $hermano->apellido1 ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Segundo apellido</legend> 
            <div class="float-input">
                <input type="text" name="apellido2" value="<?= $hermano->apellido2 ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>DNI</legend> 
            <div class="float-input">
                <input type="text" name="dni" value="<?= $hermano->dni ?>" /></p>
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Tipo de vía</legend> 
            <div class="float-input">
                <?= crearDesplegable('tipo_via', $lisTipoVia, $hermano->tipo_via, NULL, ['desc' => 'nombre', 'valor' => 'id']) ?>
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Dirección</legend> 
            <div class="float-input">
                <input type="text" name="direccion" value="<?= $hermano->direccion ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Número</legend> 
            <div class="float-input">
                <input type="text" name="numero" value="<?= $hermano->numero ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Piso</legend> 
            <div class="float-input">
                <input type="text" name="piso" value="<?= $hermano->piso ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Puerta</legend> 
            <div class="float-input">
                <input type="text" name="puerta" value="<?= $hermano->puerta ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Código postal</legend> 
            <div class="float-input">
                <input type="text" name="codigo_postal" value="<?= $hermano->codigo_postal ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Población</legend> 
            <div class="float-input">
                <input type="text" name="poblacion" value="<?= $hermano->poblacion ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Móvil</legend> 
            <div class="float-input">
                <input type="text" name="movil" value="<?= $hermano->movil ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Fijo</legend> 
            <div class="float-input">
                <input type="text" name="fijo" value="<?= $hermano->fijo ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Email</legend> 
            <div class="float-input">
                <input type="text" name="email" value="<?= $hermano->email ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Twitter</legend> 
            <div class="float-input">
                <input type="text" name="twitter" value="<?= $hermano->twitter ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Facebook</legend> 
            <div class="float-input">
                <input type="text" name="facebook" value="<?= $hermano->facebook ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Instagram</legend> 
            <div class="float-input">
                <input type="text" name="instagram" value="<?= $hermano->instagram ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Provincia</legend> 
            <div class="float-input">
                <?= crearDesplegable('provincia', $lisProvincia, $hermano->provincia, NULL, ['desc' => 'nombre', 'valor' => 'idProvincia'], TRUE) ?>
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Tipo de pago</legend> 
            <div class="float-input">
                <?= crearDesplegable('tipo', $lisTipoPago, $hermano->tipo, NULL, ['desc' => 'nombre', 'valor' => 'id']) ?>
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Cuenta corriente</legend> 
            <div class="float-input">
                <input type="text" name="cuenta_corriente" value="<?= $hermano->cuenta_corriente ?>" />
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Familia</legend> 
            <div class="float-input">
                <?= crearDesplegable('familia', $lisFamilia, $hermano->familia, NULL, ['desc' => 'nombre', 'valor' => 'id']) ?>
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
        <fieldset>
            <legend>Medalla</legend> 
            <div class="float-input">
                <?= crearListaRadio('medalla', [['nombre' => 'Si', 'id' => '1'], ['nombre' => 'No', 'id' => '0']], $hermano->medalla) ?>
                <span><i class="fa fa-user"></i></span>
            </div>
        </fieldset>
    </div>
    <input type="submit" value="Modificar" />
</form>
