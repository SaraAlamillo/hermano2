<?php

if (!function_exists('necesitaInstalador')) {

    function necesitaInstalador() {
        $fichero = __DIR__ . '/../config/database.php';
        $lineas = file($fichero);

        $contador = 0;

        foreach ($lineas as $l) {
            if (! (strpos($l, '$db["default"]["username"]') == FALSE)) {
                $contador++;
            } else if (! (strpos($l, '$db["default"]["hostname"]') == FALSE)) {
                $contador++;
            } else if (! (strpos($l, '$db["default"]["password"]') == FALSE)) {
                $contador++;
            } else if (! (strpos($l, '$db["default"]["database"]') == FALSE)) {
                $contador++;
            }
        }
        
        if ($contador == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
