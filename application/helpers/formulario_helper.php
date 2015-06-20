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
        $html = '<div class="btn-group" data-toggle="buttons">';

        foreach ($valores as $v) {
            if ($porDefecto == $v[$camposDatos['valor']]) {
                $html .= '<label class="btn btn-primary active"><input type="radio" name="' . $nombre . '" id="' . $v[$camposDatos['valor']] . '" value="' . $v[$camposDatos['valor']] . '" autocomplete="off" checked="checked">' . $v[$camposDatos['desc']] . '</label>';
            } else {
                $html .= '<label class = "btn btn-primary"><input type = "radio" name = "' . $nombre . '" id = "' . $v[$camposDatos['valor']] . '" value="' . $v[$camposDatos['valor']] . '" autocomplete = "off">' . $v[$camposDatos['desc']] . '</label>';
            }
        }

        $html .= '</div>';

        return $html;
    }

}

