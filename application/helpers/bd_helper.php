<?php

if (!function_exists('obtenerEnumerados')) {

    function obtenerEnumerados($tabla, $campo) {
        $CI = & get_instance();
        $consulta = $CI->db->query("SHOW COLUMNS FROM $tabla LIKE '$campo'");
        $resultado = $consulta->row();
        $valores = substr($resultado->Type, strpos($resultado->Type, '(') + 1, strpos($resultado->Type, ')') - (strpos($resultado->Type, '(') + 1));
        $valores = str_replace("'", "", $valores);
        $valores = explode(',', $valores);
        $retorno = [];
        for ($i = 0; $i < count($valores); $i++) {
            array_push($retorno, ['nombre' => $valores[$i], 'id' => $valores[$i]]);
        }
        return $retorno;
    }

}
if (!function_exists('nombresCampos')) {

    function nombresCampos($campo) {
        $campos = [
            'idHermano' => 'Número de hermano',
            'vivienda' => 'Vivienda',
            'tratamiento' => 'Tratamiento',
            'nombre' => 'Nombre',
            'apellido1' => 'Primer apellido',
            'apellido2' => 'Segundo apellido',
            'fecha_nacimiento' => 'Fecha de nacimiento',
            'dni' => 'DNI',
            'tipo_via' => 'Tipo de vía',
            'direccion' => 'Dirección',
            'numero' => 'Número',
            'piso' => 'Piso',
            'puerta' => 'Puerta',
            'codigo_postal' => 'Código postal',
            'poblacion' => 'Población',
            'movil' => 'Móvil',
            'fijo' => 'Fijo',
            'email' => 'Correo electrónico',
            'twitter' => 'Twitter',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'tipo' => 'Tipo de pago',
            'cuenta_corriente' => 'Cuenta corriente',
            'familia' => 'Familia',
            'provincia' => 'Provincia',
            'medalla' => 'Medalla',
            'cuota1' => 'Primer plazo',
            'cuota2' => 'Segundo plazo',
            'idRemesa' => 'Número de remesa',
            'anio' => 'Año',
            'descripcion' => 'Descripción',
            'cif' => 'CIF',
            'nombre_empresa' => 'Nombre de la empresa',
            'idContacto' => 'Número de contacto'
        ];

        return $campos[$campo];
    }

}

