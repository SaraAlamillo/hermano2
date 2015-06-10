<?= anchor(site_url('hermano'), 'Volver al listado') ?>
<dl class="dl-horizontal">
    <dt>Vivienda </dt>
    <dd>
        <dl class="dl-horizontal">
            <dt>Barriada</dt> 
            <dd><?= $hermano->vivienda->Barriada ?></dd>
            <dt>Número</dt> 
            <dd><?= $hermano->vivienda->Numero ?></dd>
            <dt>Línea</dt> 
            <dd><?= $hermano->vivienda->Linea ?></dd>
        </dl>
    </dd>
    <dt>Tratamiento</dt> 
    <dd><?= $hermano->tratamiento ?></dd>
    <dt>Nombre</dt> 
    <dd><?= $hermano->nombre ?></dd>
    <dt>Primer apellido</dt> 
    <dd><?= $hermano->apellido1 ?></dd>
    <dt>Segundo apellido</dt> 
    <dd><?= $hermano->apellido2 ?></dd>
    <dt>DNI</dt> 
    <dd><?= $hermano->dni ?></dd>
    <dt>Tipo de vía</dt> 
    <dd><?= $hermano->tipo_via ?></dd>
    <dt>Dirección</dt> 
    <dd><?= $hermano->direccion ?></dd>
    <dt>Número</dt> 
    <dd><?= $hermano->numero ?></dd>
    <dt>Piso</dt> 
    <dd><?= $hermano->piso ?></dd>
    <dt>Puerta</dt> 
    <dd><?= $hermano->puerta ?></dd>
    <dt>Código postal</dt> 
    <dd><?= $hermano->codigo_postal ?></dd>
    <dt>Población</dt> 
    <dd><?= $hermano->poblacion ?></dd>
    <dt>Móvil</dt> 
    <dd><?= $hermano->movil ?></dd>
    <dt>Fijo</dt>
    <dd><?= $hermano->fijo ?></dd>
    <dt>Email</dt> 
    <dd><?= $hermano->email ?></dd>
    <dt>Twitter</dt> 
    <dd><?= $hermano->twitter ?></dd>
    <dt>Facebook</dt>
    <dd><?= $hermano->facebook ?></dd>
    <dt>Instagram</dt>
    <dd><?= $hermano->instagram ?></dd>
    <dt>Tipo</dt>
    <dd><?= $hermano->tipo ?></dd>
    <dt>Cuenta corriente</dt> 
    <dd><?= $hermano->cuenta_corriente ?></dd>
    <dt>Familia</dt> 
    <dd><?= $hermano->familia ?></dd>
    <dt>Provincia</dt> 
    <dd><?= $hermano->provincia ?></dd>
    <dt>¿Tiene medalla?</dt>
    <?php if ($hermano->medalla == 0): ?>
        <dd>No</dd>
    <?php else: ?>
        <dd>Si</dd>
    <?php endif; ?>
</dl>
<?= anchor(site_url('hermano/cambio/' . $hermano->idHermano), 'Modificar') ?>
<?= anchor(site_url('hermano/elimina/' . $hermano->idHermano), 'Eliminar') ?>
