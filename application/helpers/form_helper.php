<?php

if (!function_exists('crearDesplegable')) {

    function crearDesplegable(
    $nombre, $datos, $valorPorDefecto = NULL, $nullValue = NULL, $camposDatos = ['desc' => 'nombre', 'valor' => 'id'], $objeto = FALSE, $atributos = '') {
        $html = "<select name='$nombre' $atributos>\n";
        if (is_array($nullValue)) {
            if ($nullValue[$camposDatos['valor']] == $valorPorDefecto) {
                $html .= "<option value='{$nullValue[$camposDatos['valor']]}' disabled='disabled' selected='selected'>{$nullValue[$camposDatos['desc']]}</option>\n";
            } else {
                $html .= "<option value='{$nullValue[$camposDatos['valor']]}' disabled='disabled'>{$nullValue[$camposDatos['desc']]}</option>\n";
            }
        }
        if ($objeto) {
            foreach ($datos as $d) {
                if ($d->$camposDatos['valor'] == $valorPorDefecto) {
                    $html .= "<option value='{$d->$camposDatos['valor']}' selected='selected'>{$d->$camposDatos['desc']}</option>\n";
                } else {
                    $html .= "<option value='{$d->$camposDatos['valor']}'>{$d->$camposDatos['desc']}</option>\n";
                }
            }
        } else {
            foreach ($datos as $d) {
                if ($d[$camposDatos['valor']] == $valorPorDefecto) {
                    $html .= "<option value='{$d[$camposDatos['valor']]}' selected='selected'>{$d[$camposDatos['desc']]}</option>\n";
                } else {
                    $html .= "<option value='{$d[$camposDatos['valor']]}'>{$d[$camposDatos['desc']]}</option>\n";
                }
            }
        }
        $html .= "</select>\n";
        return $html;
    }

}

if (!function_exists('crearListaRadio')) {

    function crearListaRadio($nombre, array $valores, $porDefecto = NULL, $camposDatos = ['desc' => 'nombre', 'valor' => 'id']) {
        $html = "";

        foreach ($valores as $v) {
            if ($porDefecto == $v[$camposDatos['valor']]) {
                $html .= "<input type='radio' name='$nombre' value='{$v[$camposDatos['valor']]}' checked=checked />{$v[$camposDatos['desc']]} \n";
            } else {
                $html .= "<input type='radio' name='$nombre' value='{$v[$camposDatos['valor']]}' />{$v[$camposDatos['desc']]} \n";
            }
        }

        return $html;
    }

}

