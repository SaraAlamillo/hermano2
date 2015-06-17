<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Validacion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function reglasVivienda() {
        $this->load->model('Vivienda_model');

        $this->form_validation->set_rules('Barriada', 'barriada', 'callback_linea_check');
        $this->form_validation->set_rules('Linea', 'línea', 'callback_numVivienda_check');
        $this->form_validation->set_rules('Numero', 'número', 'callback_barriada_check');
    }

    public function linea_check($input) {
        $valoresPosibles = $this->Vivienda_model->listarLinea();

        foreach ($valoresPosibles as $v) {
            if ($v['id'] == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('linea_check', 'El campo %s no es válido');
        return FALSE;
    }

    public function numVivienda_check($input) {
        $valoresPosibles = $this->Vivienda_model->listarNumero();

        foreach ($valoresPosibles as $v) {
            if ($v['id'] == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('numero_check', 'El campo %s no es válido');
        return FALSE;
    }

    public function barriada_check($input) {
        $valoresPosibles = $this->Vivienda_model->listarBarriada();

        foreach ($valoresPosibles as $v) {
            if ($v['id'] == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('barriada_check', 'El campo %s no es válido');
        return FALSE;
    }

    public function reglasHermano() {
        $this->load->model('Hermano_model');

        $this->form_validation->set_message('valid_email', 'El campo %s debe tener una dirección de correo electrónico válida');

        $this->form_validation->set_rules('familia', 'familia', 'callback_familia_check');
        $this->form_validation->set_rules('vivienda', 'vivienda', 'callback_vivienda_check');
        $this->form_validation->set_rules('tratamiento', 'tratamiento', 'callback_tratamiento_check');
        $this->form_validation->set_rules('nombre', 'nombre', 'callback_letra_check');
        $this->form_validation->set_rules('apellido1', 'primer apellido', 'callback_letra_check');
        $this->form_validation->set_rules('apellido2', 'segundo apellido', 'callback_letra_check');
        $this->form_validation->set_rules('dni', 'DNI', 'callback_dni_check');
        $this->form_validation->set_rules('movil', 'teléfono móvil', 'callback_telefono_check');
        $this->form_validation->set_rules('fijo', 'teléfono fijo', 'callback_telefono_check');
        $this->form_validation->set_rules('email', 'correo electrónico', 'valid_email');
        $this->form_validation->set_rules('tipo', 'tipo de pago', 'callback_tipoPago_check');
        $this->form_validation->set_rules('cuenta_corriente', 'cuenta corriente', 'callback_cc_check');
        $this->form_validation->set_rules('tipo_via', 'tipo de vía', 'callback_tipoVia_check');
        $this->form_validation->set_rules('direccion', 'dirección', 'callback_direccion_check');
        $this->form_validation->set_rules('numero', 'número', 'callback_numero_check');
        $this->form_validation->set_rules('piso', 'piso', 'callback_numero_check');
        $this->form_validation->set_rules('puerta', 'puerta', 'callback_piso_check');
        $this->form_validation->set_rules('codigo_postal', 'código postal', 'callback_cp_check');
        $this->form_validation->set_rules('poblacion', 'población', 'callback_letra_check');
        $this->form_validation->set_rules('provincia', 'provincia', 'callback_provincia_check');
        $this->form_validation->set_rules('twitter', 'Twitter', 'callback_url_check');
        $this->form_validation->set_rules('facebook', 'Facebook', 'callback_url_check');
        $this->form_validation->set_rules('instagram', 'Instagram', 'callback_url_check');
    }

    public function familia_check($input) {
        if ($input == '') {
            return TRUE;
        }
        $valoresPosibles = $this->Hermano_model->listarFamilia();

        foreach ($valoresPosibles as $v) {
            if ($v['id'] == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('familia_check', 'El campo %s no es válido');
        return FALSE;
    }

    public function vivienda_check($input) {
        if ($input == '') {
            return TRUE;
        }
        $viviendas = $this->Hermano_model->listarTodo(['idVivienda' => $input]);

        if (count($viviendas) > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('vivienda_check', 'El campo %s no es válido');
            return FALSE;
        }
    }

    public function tratamiento_check($input) {
        if ($input == '') {
            return TRUE;
        }
        $valoresPosibles = $this->Hermano_model->listarTratamiento();

        foreach ($valoresPosibles as $v) {
            if ($v['id'] == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('tratamiento_check', 'El campo %s no es válido');
        return FALSE;
    }

    public function letra_check($input) {
        if ($input == '') {
            return TRUE;
        }
        if (preg_match('/^[a-zA-ZüÜáéíóúÁÉÍÓÚñÑ ]+[a-zA-ZüÜáéíóúÁÉÍÓÚñÑª\. ]*$/', $input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('letra_check', 'El campo %s sólo puede contener letras y los carácteres "ª" y "."');
            return FALSE;
        }
    }

    public function dni_check($input) {
        if ($input == '') {
            return TRUE;
        }
        if (preg_match('/^\d{8}[-]?[A-Za-z]{1}$/', $input)) {
            $dni = strtoupper($input);
            $letra = substr($dni, -1, 1);
            $numero = substr($dni, 0, 8);
            $numero = str_replace(array('X', 'Y', 'Z'), array(0, 1, 2), $numero);
            $modulo = $numero % 23;
            $letras_validas = "TRWAGMYFPDXBNJZSQVHLCKE";
            $letra_correcta = substr($letras_validas, $modulo, 1);
            if ($letra_correcta != $letra) {
                $this->form_validation->set_message('dni_check', 'El campo %s no tiene la letra correcta');
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            $this->form_validation->set_message('dni_check', 'El campo %s no es válido');
            return FALSE;
        }
    }

    public function cp_check($input) {
        if ($input == '') {
            return TRUE;
        }
        if (preg_match('/^0[1-9][0-9]{3}|[1-4][0-9]{4}|5[0-2][0-9]{3}$/', $input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('cp_check', 'El campo %s no es válido');
            return FALSE;
        }
    }

    public function provincia_check($input) {
        if ($input == '') {
            return TRUE;
        }
        $this->load->model('Provincia_model');
        $provincias = $this->Provincia_model->listar();

        foreach ($provincias as $p) {
            if ($p->idProvincia == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('provincia_check', 'El campo %s no es válido');
        return FALSE;
    }

    public function direccion_check($input) {
        if ($input == '') {
            return TRUE;
        }
        if (preg_match('/^[a-zA-Z0-9üÜáéíóúÁÉÍÓÚñÑ ]+[a-zA-Z0-9 üÜáéíóúÁÉÍÓÚñÑºª\/.-]*$/', $input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('direccion_check', 'El campo %s sólo puede contener letras, números y los carácteres "º", "ª", "/", "." y "-"');
            return FALSE;
        }
    }

    public function telefono_check($input) {
        if ($input == '') {
            return TRUE;
        }
        if (preg_match(' /^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/ ', $input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('telefono_check', 'El campo %s debe contener un número de teléfono nacional');
            return FALSE;
        }
    }

    public function tipoPago_check($input) {
        if ($input == '') {
            return TRUE;
        }
        $valoresPosibles = $this->Hermano_model->listarTipoPago();

        foreach ($valoresPosibles as $v) {
            if ($v['id'] == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('tipoPago_check', 'El campo %s no es válido');
        return FALSE;
    }

    public function cc_check($input) {
        if ($input == '') {
            return TRUE;
        }
        return TRUE;
    }

    public function tipoVia_check($input) {
        if ($input == '') {
            return TRUE;
        }
        $valoresPosibles = $this->Hermano_model->listarTipoVia();

        foreach ($valoresPosibles as $v) {
            if ($v['id'] == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('tipoVia_check', 'El campo %s no es válido');
        return FALSE;
    }

    public function url_check($input) {
        if ($input == '') {
            return TRUE;
        }
        if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('url_check', 'El campo %s no contiene una URL válida');
            return FALSE;
        }
    }
    
    public function numero_check($input) {
        if ($input == '') {
            return TRUE;
        }
        if (preg_match('/^\D+$/', $input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('numero_check', 'El campo %s no contiene un número entero');
            return FALSE;
        }
    }
    
    public function piso_check($input) {
        if ($input == '') {
            return TRUE;
        }
        
        if (preg_match('/[A-Z]/', $input) || preg_match('/[a-z]/', $input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('piso_check', 'El campo %s no contiene una letra');
            return FALSE;
        }
    }

}
