<?php

$config = [
    'hermano' => [
        ['field' => 'instagram', 'label' => 'Instagram', 'rules' => 'callback_url_check'],
        ['field' => 'facebook', 'label' => 'Facebook', 'rules' => 'callback_url_check'],
        ['field' => 'twitter', 'label' => 'Twitter', 'rules' => 'callback_url_check'],
        ['field' => 'provincia', 'label' => 'provincia', 'rules' => 'callback_provincia_check'],
        ['field' => 'poblacion', 'label' => 'población', 'rules' => 'callback_letra_check'],
        ['field' => 'codigo_postal', 'label' => 'código postal', 'rules' => 'callback_cp_check'],
        ['field' => 'puerta', 'label' => 'puerta', 'rules' => 'callback_puerta_check'],
        ['field' => 'piso', 'label' => 'piso', 'rules' => 'callback_numero_check'],
        ['field' => 'numero', 'label' => 'número', 'rules' => 'callback_numero_check'],
        ['field' => 'direccion', 'label' => 'dirección', 'rules' => 'callback_letra_check'],
        ['field' => 'tipo_via', 'label' => 'tipo de vía', 'rules' => 'callback_tipoVia_check'],
        ['field' => 'cuenta_corriente', 'label' => 'cuenta corriente', 'rules' => 'callback_cc_check'],
        ['field' => 'tipo', 'label' => 'tipo de pago', 'rules' => 'callback_tipoPago_check'],
        ['field' => 'email', 'label' => 'correo electrónico', 'rules' => 'valid_email'],
        ['field' => 'fijo', 'label' => 'teléfono fijo', 'rules' => 'callback_telefono_check'],
        ['field' => 'movil', 'label' => 'teléfono móvil', 'rules' => 'callback_telefono_check'],
        ['field' => 'dni', 'label' => 'DNI', 'rules' => 'callback_dni_check'],
        ['field' => 'apellido2', 'label' => 'segundo apellido', 'rules' => 'callback_letra_check'],
        ['field' => 'apellido1', 'label' => 'primer apellido', 'rules' => 'callback_letra_check'],
        ['field' => 'nombre', 'label' => 'nombre', 'rules' => 'callback_letra_check'],
        ['field' => 'tratamiento', 'label' => 'tratamiento', 'rules' => 'callback_tratamiento_check'],
        ['field' => 'vivienda', 'label' => 'vivienda', 'rules' => 'callback_vivienda_check'],
        ['field' => 'familia', 'label' => 'familia', 'rules' => 'callback_familia_check']
    ],
    'contacto' => [
        ['field' => 'instagram', 'label' => 'Instagram', 'rules' => 'callback_url_check'],
        ['field' => 'facebook', 'label' => 'Facebook', 'rules' => 'callback_url_check'],
        ['field' => 'twitter', 'label' => 'Twitter', 'rules' => 'callback_url_check'],
        ['field' => 'provincia', 'label' => 'provincia', 'rules' => 'callback_provincia_check'],
        ['field' => 'poblacion', 'label' => 'población', 'rules' => 'callback_letra_check'],
        ['field' => 'codigo_postal', 'label' => 'código postal', 'rules' => 'callback_cp_check'],
        ['field' => 'puerta', 'label' => 'puerta', 'rules' => 'callback_puerta_check'],
        ['field' => 'piso', 'label' => 'piso', 'rules' => 'callback_numero_check'],
        ['field' => 'numero', 'label' => 'número', 'rules' => 'callback_numero_check'],
        ['field' => 'direccion', 'label' => 'dirección', 'rules' => 'callback_letra_check'],
        ['field' => 'tipo_via', 'label' => 'tipo de vía', 'rules' => 'callback_tipoViaC_check'],
        ['field' => 'email', 'label' => 'correo electrónico', 'rules' => 'valid_email'],
        ['field' => 'fijo', 'label' => 'teléfono fijo', 'rules' => 'callback_telefono_check'],
        ['field' => 'movil', 'label' => 'teléfono móvil', 'rules' => 'callback_telefono_check'],
        ['field' => 'apellido2', 'label' => 'segundo apellido', 'rules' => 'callback_letra_check'],
        ['field' => 'apellido1', 'label' => 'primer apellido', 'rules' => 'callback_letra_check'],
        ['field' => 'nombre', 'label' => 'nombre', 'rules' => 'callback_letra_check'],
        ['field' => 'tratamiento', 'label' => 'tratamiento', 'rules' => 'callback_tratamientoC_check'],
        ['field' => 'nombre_empresa', 'label' => 'empresa', 'rules' => 'callback_letra_check'],
        ['field' => 'cif', 'label' => 'CIF', 'rules' => 'callback_dni_check'],
        ['field' => 'tipo', 'label' => 'tipo de contacto', 'rules' => 'callback_tipoContacto_check']
    ],
    'pago' => [
        ['field' => 'cuota1', 'label' => 'primer plazo', 'rules' => 'callback_fecha_check'],
        ['field' => 'cuota2', 'label' => 'segundo plazo', 'rules' => 'callback_fecha_check'],
        ['field' => 'hermano', 'label' => 'número de hermano', 'rules' => 'callback_hermano_check'],
        ['field' => 'anio', 'label' => 'año', 'rules' => 'callback_anio_check'],
        ['field' => 'descripcion', 'label' => 'descripción', 'rules' => 'callback_remesa_check']
    ],
    'remesa' => [
        ['field' => 'anio', 'label' => 'año', 'rules' => 'callback_anio_check']
    ],
    'vivienda' => [
        ['field' => 'Barriada', 'label' => 'barriada', 'rules' => 'callback_barriada_check'],
        ['field' => 'Linea', 'label' => 'línea', 'rules' => 'callback_numVivienda_check'],
        ['field' => 'Numero', 'label' => 'número', 'rules' => 'callback_linea_check']
    ]
];

$config['error_prefix'] = '<div class="alert alert-danger" role="alert">';
$config['error_suffix'] = '</div>';

