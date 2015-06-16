<h1>Vista detalla de un hermano</h1>
<table class="table detalle">
    <tr>
        <th colspan="2" class="titulo">Datos personales</th> 
        <th>Vivienda </th>
        <td>
            Barriada: <?= $hermano->vivienda->Barriada ?> <br />
            Número: <?= $hermano->vivienda->Numero ?><br />
            Línea: <?= $hermano->vivienda->Linea ?>
        </td>
    </tr>
    <tr>
        <th>Tratamiento</th> 
        <td><?= $hermano->tratamiento ?></td> 
        <th>Familia</th> 
        <td><?= $hermano->familia ?></td>
    </tr>
    <tr>
        <th>Nombre</th> 
        <td><?= $hermano->nombre ?></td> 
        <th>¿Tiene medalla?</th>
        <?php if ($hermano->medalla == 0): ?>
            <td>No</td>
        <?php else: ?>
            <td>Si</td>
        <?php endif; ?>
    </tr>
    <tr>
        <th>Primer apellido</th> 
        <td><?= $hermano->apellido1 ?></td> 
        <th colspan="2" class="titulo">Dirección</th>
    </tr>
    <tr>
        <th>Segundo apellido</th> 
        <td><?= $hermano->apellido2 ?></td>
        <th>Tipo de vía</th>
        <td><?= $hermano->tipo_via ?></td>
    </tr>
    <tr>
        <th>DNI</th> 
        <td><?= $hermano->dni ?></td>
        <th>Dirección</th> 
        <td><?= $hermano->direccion ?></td>
    </tr>
    <tr>
        <th colspan="2" class="titulo">Contacto</th>
        <th>Número</th>
        <td><?= $hermano->numero ?></td>
    </tr>
    <tr>
        <th>Móvil</th> 
        <td><?= $hermano->movil ?></td>
        <th>Piso</th> 
        <td><?= $hermano->piso ?></td>
    </tr>
    <tr>
        <th>Fijo</th>
        <td><?= $hermano->fijo ?></td> 
        <th>Puerta</th>
        <td><?= $hermano->puerta ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= $hermano->email ?></td>
        <th>Código postal</th>
        <td><?= $hermano->codigo_postal ?></td>
    </tr>
    <tr>
        <th colspan="2" class="titulo">Redes Sociales</th>
        <th>Población</th>
        <td><?= $hermano->poblacion ?></td>
    </tr>
    <tr>
        <th>Twitter</th> 
        <td><?= $hermano->twitter ?></td>
        <th>Provincia</th> 
        <td><?= $hermano->provincia ?></td>
    </tr>
    <tr>
        <th>Facebook</th>
        <td><?= $hermano->facebook ?></td>
        <th colspan="2" class="titulo">Formas de pago</th>
    </tr>
    <tr>
        <th>Instagram</th>
        <td><?= $hermano->instagram ?></td> 
        <th>Tipo</th>
        <td><?= $hermano->tipo ?></td>
    </tr>
    <tr>
        <td class="vacio"></td>
        <td class="vacio"></td>
        <th>Cuenta corriente</th>
        <td><?= $hermano->cuenta_corriente ?></td>
</table>
<?= anchor(site_url('hermano'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>
<?= anchor(site_url('hermano/cambio/' . $hermano->idHermano), '<img alt="Modificar" title ="Modificar" src="' . base_url() . 'assets/images/icons/btnEditar.png" />') ?>
<?= anchor(site_url('hermano/elimina/' . $hermano->idHermano), '<img alt="Eliminar" title ="Eliminar" src="' . base_url() . 'assets/images/icons/btnBorrar.png" />') ?>
