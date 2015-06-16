<h1>Vista detalla de un contacto</h1>
<table class="table detalle">
    <tr>
        <th colspan="2" class="titulo">Datos personales</th>
        <th>Tipo de contacto</th>
        <td><?= $contacto->tipo ?></td>
    </tr>
    <tr>
        <th>Empresa</th>
        <td><?= $contacto->nombre_empresa ?></td>
        <th colspan="2" class="titulo">Dirección</th>
    </tr>
    <tr>
        <th>Tratamiento</th>
        <td><?= $contacto->tratamiento ?></td>
        <th>Tipo de vía</th>
        <td><?= $contacto->tipo_via ?></td>
    </tr>
    <tr>
        <th>Nombre</th>
        <td><?= $contacto->nombre ?></td>
        <th>Dirección</th>
        <td><?= $contacto->direccion ?></td>
    </tr>
    <tr>
        <th>Primer apellido</th>
        <td><?= $contacto->apellido1 ?></td>
        <th>Número</th>
        <td><?= $contacto->numero ?></td>
    </tr>
    <tr>
        <th>Segundo apellido</th>
        <td><?= $contacto->apellido2 ?></td>
        <th>Piso</th>
        <td><?= $contacto->piso ?></td>
    </tr>
    <tr>
        <th>CIF</th>
        <td><?= $contacto->cif ?></td>
        <th>Puerta</th>
        <td><?= $contacto->puerta ?></td>
    </tr>
    <tr>
        <th colspan="2" class="titulo">Contacto</th>
        <th>Código postal</th>
        <td><?= $contacto->codigo_postal ?></td>
    </tr>
    <tr>
        <th>Móvil</th>
        <td><?= $contacto->movil ?></td>
        <th>Población</th>
        <td><?= $contacto->poblacion ?></td>
    </tr>
    <tr>
        <th>Fijo</th>
        <td><?= $contacto->fijo ?></td>
        <th>Provincia</th>
        <td><?= $contacto->provincia ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= $contacto->email ?></td>
        <th colspan="2" class="titulo">Redes sociales</th>
    </tr>
    <tr>
        <td class="vacio"></td>
        <td class="vacio"></td>
        <th>Twitter</th>
        <td><?= $contacto->twitter ?></td>
    </tr>
    <tr>
        <td class="vacio"></td>
        <td class="vacio"></td>
        <th>Facebook</th>
        <td><?= $contacto->facebook ?></td>
    </tr>
    <tr>
        <td class="vacio"></td>
        <td class="vacio"></td>
        <th>Instagram</th>
        <td><?= $contacto->instagram ?></td>
    </tr>
</table>
<?= anchor(site_url('contacto'), '<img alt="Volver al listado" title="Volver al listado" src="' . base_url() . 'assets/images/icons/btnAtras.png" />') ?>
<?= anchor(site_url('contacto/cambio/' . $contacto->idContacto), '<img alt="Modificar" title ="Modificar" src="' . base_url() . 'assets/images/icons/btnEditar.png" />') ?>
<?= anchor(site_url('contacto/elimina/' . $contacto->idContacto), '<img alt="Eliminar" title ="Eliminar" src="' . base_url() . 'assets/images/icons/btnBorrar.png" />') ?>