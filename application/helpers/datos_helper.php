<?php

if (!function_exists('quitaDatoVacio')) {

    function quitaDatoVacio($datosAntiguos) {
        $datosNuevos = [];

        foreach ($datosAntiguos as $key => $value) {
            if ($value == '') {
                $datosNuevos[$key] = NULL;
            } else {
                $datosNuevos[$key] = $value;
            }
        }

        return $datosNuevos;
    }

}