<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    function __construct($config = array()) {
        parent::__construct($config);
    }

    public function linea_check($input) {
        if ($input == '') {
            return TRUE;
        }
        $valoresPosibles = $this->Vivienda_model->listarLinea();

        foreach ($valoresPosibles as $v) {
            if ($v['id'] == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('linea_check', 'El campo <b>%s</b> no es válido');
        return FALSE;
    }

    public function numVivienda_check($input) {
        if ($input == '') {
            return TRUE;
        }
        $valoresPosibles = $this->Vivienda_model->listarNumero();

        foreach ($valoresPosibles as $v) {
            if ($v['id'] == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('numVivienda_check', 'El campo <b>%s</b> no es válido');
        return FALSE;
    }

    public function barriada_check($input) {
        if ($input == '') {
            return TRUE;
        }
        $valoresPosibles = $this->Vivienda_model->listarBarriada();

        foreach ($valoresPosibles as $v) {
            if ($v['id'] == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('barriada_check', 'El campo <b>%s</b> no es válido');
        return FALSE;
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

        $this->form_validation->set_message('familia_check', 'El campo <b>%s</b> no es válido');
        return FALSE;
    }

    public function vivienda_check($input) {
        if ($input == '') {
            return TRUE;
        }

        $this->load->model('Vivienda_model');

        $viviendas = $this->Vivienda_model->listarTodo(['idVivienda' => $input]);

        if (count($viviendas) > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('vivienda_check', 'El campo <b>%s</b> no es válido');
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

        $this->form_validation->set_message('tratamiento_check', 'El campo <b>%s</b> no es válido');
        return FALSE;
    }

    public function tratamientoC_check($input) {
        if ($input == '') {
            return TRUE;
        }
        $valoresPosibles = $this->Contacto_model->listarTratamiento();

        foreach ($valoresPosibles as $v) {
            if ($v['id'] == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('tratamientoC_check', 'El campo <b>%s</b> no es válido');
        return FALSE;
    }

    public function letra_check($input) {
        if ($input == '') {
            return TRUE;
        }
        if (preg_match('/^[a-zA-ZüÜáéíóúÁÉÍÓÚñÑ ]+[a-zA-ZüÜáéíóúÁÉÍÓÚñÑª\. ]*$/', $input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('letra_check', 'El campo <b>%s</b> sólo puede contener letras y los carácteres "ª" y "."');
            return FALSE;
        }
    }

    public function dni_check($input) {
        if ($input == '') {
            return TRUE;
        }

        $this->load->helper('datos');

        if (validarDocumentosFiscales($input) > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('dni_check', 'El campo <b>%s</b> no es válido');
            return FALSE;
        }
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

        $this->form_validation->set_message('tipoVia_check', 'El campo <b>%s</b> no es válido');
        return FALSE;
    }

    public function tipoViaC_check($input) {
        if ($input == '') {
            return TRUE;
        }
        $valoresPosibles = $this->Contacto_model->listarTipoVia();

        foreach ($valoresPosibles as $v) {
            if ($v['id'] == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('tipoViaC_check', 'El campo <b>%s</b> no es válido');
        return FALSE;
    }

    public function url_check($input) {
        if ($input == '') {
            return TRUE;
        }
        if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('url_check', 'El campo <b>%s</b> no contiene una URL válida');
            return FALSE;
        }
    }

    public function numero_check($input) {
        if ($input == '') {
            return TRUE;
        }
        if (!strpos($input, '.') && !strpos($input, ',') && !strpos($input, "'") && !strpos($input, '-')) {
            if (is_numeric($input) && ($input > 0)) {
                return TRUE;
            }
        }
        $this->form_validation->set_message('numero_check', 'El campo <b>%s</b> no contiene un número entero');
        return FALSE;
    }

    public function puerta_check($input) {
        if ($input == '') {
            return TRUE;
        }

        if (preg_match('/[A-Z]/', $input) || preg_match('/[a-z]/', $input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('puerta_check', 'El campo <b>%s</b> no contiene una letra');
            return FALSE;
        }
    }

    public function anio_check($input) {
        if ($input == '') {
            return TRUE;
        }

        if ($this->numero_check($input) && $input > 0 && ($input <= date('Y') || $input <= date('y'))) {
            return TRUE;
        } else {
            $this->form_validation->set_message('anio_check', 'El campo <b>%s</b> no contiene un año real');
            return FALSE;
        }
    }

    public function fecha_check($input) {
        if ($input == '') {
            return TRUE;
        }

        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('fecha_check', 'El campo <b>%s</b> no contiene una fecha real');
            return FALSE;
        }
    }

    public function hermano_check($input) {
        if ($input == '') {
            return TRUE;
        }
        $this->load->model('Hermano_model');

        if (empty($this->Hermano_model->listaUno($input))) {
            $this->form_validation->set_message('hermano_check', 'No existe el <b>%s</b> dado');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function remesa_check($input) {
        if ($input == '') {
            return TRUE;
        }
        $this->load->model('Remesa_model');

        if (empty($this->Remesa_model->listaUno($input))) {
            $this->form_validation->set_message('remesa_check', 'No existe el <b>%s</b> dado');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function tipoContacto_check($input) {
        if ($input == '') {
            return TRUE;
        }

        if ($this->Contacto_model->existeIdTipo($input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('tipoContacto_check', 'No existe el <b>%s</b> dado');
            return FALSE;
        }
    }

    public function telefono_check($input) {
        if ($input == '') {
            return TRUE;
        }

        if (preg_match('/^[9|8|6|7][0-9]{8}$/', $input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('telefono_check', 'El campo <b>%s</b> no contiene un teléfono nacional');
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

        $this->form_validation->set_message('tipoPago_check', 'El campo <b>%s</b> no es válido');
        return FALSE;
    }

    public function provincia_check($input) {
        if ($input == '') {
            return TRUE;
        }

        $this->load->model('Provincia_model');
        $valoresPosibles = $this->Provincia_model->listar();

        foreach ($valoresPosibles as $v) {
            if ($v->idProvincia == $input) {
                return TRUE;
            }
        }

        $this->form_validation->set_message('provincia_check', 'El campo <b>%s</b> no contiene una provincia española');
        return FALSE;
    }

    public function cp_check($input) {
        if ($input == '') {
            return TRUE;
        }
        if (preg_match('/^0[1-9][0-9]{3}|[1-4][0-9]{4}|5[0-2][0-9]{3}$/', $input)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('cp_check', 'El campo <b>%s</b> no tiene un código postal válido');
            return FALSE;
        }
    }

}
