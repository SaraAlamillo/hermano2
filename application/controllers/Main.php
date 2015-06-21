<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    protected $rolActual;

    const MaxPorPag = 25;

    public function __construct() {
        parent::__construct();
        if (empty($this->session->userdata('login')) || $this->session->userdata('login') !== TRUE) {
            $this->login();
        } else {
            $this->rolActual = $this->session->userdata('rol');
        }
    }

    public function index() {
        $this->vista($this->load->view('Menu', ['rolActual' => $this->rolActual], TRUE), 'home', TRUE);
    }

    public function vista($contenido, $seccionActiva, $menu = FALSE) {
        $parametros = [
            'contenido' => $contenido,
            'activo' => $seccionActiva,
            'menu' => $menu,
            'rolActual' => $this->rolActual
        ];

        $this->load->view('Plantilla', $parametros);
    }

    public function login() {
        if ($this->input->post()) {
            $this->load->model('Usuario_model');

            if ($this->Usuario_model->usuarioCorrecto($this->input->post())) {
                $this->session->set_userdata('login', TRUE);
                $this->session->set_userdata('rol', $this->Usuario_model->getRol($this->input->post()));
                redirect($this->input->post('url'));
            } else {
                $this->session->set_flashdata("alerta", ['mensaje' => 'El usuario o contraseña introducido no es correcto', 'tipo' => 'danger']);
                redirect(site_url());
            }
        } else {
            $parametros = [
                "alerta" => $this->session->flashdata("alerta")
            ];

            $this->load->view('login', $parametros);
        }
    }

    public function salir() {
        $this->session->set_userdata('login', FALSE);
        $this->session->set_flashdata("alerta", ['mensaje' => 'Se ha cerrado la sesión', 'tipo' => 'success']);
        redirect(site_url());
    }

    public function paginar($url, $total, $segmento = 3) {
        $this->load->library("pagination");

        $config['base_url'] = $url;
        $config['per_page'] = self::MaxPorPag;
        $config['total_rows'] = $total;
        $config['uri_segment'] = $segmento;
        $config['num_links'] = 1;

        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = ' </ul></nav>';

        $config['next_tag_open'] = '<li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_close'] = '</li>';

        $config['first_tag_open'] = '<li>';
        $config['first_link'] = 'Primera';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li>';
        $config['last_link'] = 'Última';
        $config['last_tag_close'] = '</li>';

        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '<li>';

        $this->pagination->initialize($config);

        return $this->pagination->create_links();
    }

    public function reglasVivienda() {
        $this->load->model('Vivienda_model');

        $this->form_validation->set_rules('Barriada', 'barriada', 'callback_barriada_check');
        $this->form_validation->set_rules('Linea', 'línea', 'callback_numVivienda_check');
        $this->form_validation->set_rules('Numero', 'número', 'callback_linea_check');
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

    public function reglasHermano() {
        $this->load->model('Hermano_model');

        $this->form_validation->set_message('valid_email', 'El campo <b>%s</b> debe tener una dirección de correo electrónico válida');

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
        $this->form_validation->set_rules('direccion', 'dirección', 'callback_letra_check');
        $this->form_validation->set_rules('numero', 'número', 'callback_numero_check');
        $this->form_validation->set_rules('piso', 'piso', 'callback_numero_check');
        $this->form_validation->set_rules('puerta', 'puerta', 'callback_puerta_check');
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

    public function reglasRemesa() {
        $this->form_validation->set_rules('anio', 'año', 'callback_anio_check');
    }

    public function anio_check($input) {
        if ($input == '') {
            return TRUE;
        }

        if ($this->numero_check( $input) && $input > 0 && ($input <= date('Y') || $input <= date('y'))) {
            return TRUE;
        } else {
            $this->form_validation->set_message('anio_check', 'El campo <b>%s</b> no contiene un año real');
            return FALSE;
        }
    }

    public function reglasPago() {
        $this->form_validation->set_rules('cuota1', 'primer plazo', 'callback_fecha_check');
        $this->form_validation->set_rules('cuota2', 'segundo plazo', 'callback_fecha_check');
        $this->form_validation->set_rules('hermano', 'número de hermano', 'callback_hermano_check');
        $this->form_validation->set_rules('anio', 'año', 'callback_anio_check');
        $this->form_validation->set_rules('descripcion', 'descripción', 'callback_remesa_check');
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

    public function reglasContacto() {
        $this->load->model('Contacto_model');

        $this->form_validation->set_message('valid_email', 'El campo <b>%s</b> debe tener una dirección de correo electrónico válida');

        $this->form_validation->set_rules('tratamiento', 'tratamiento', 'callback_tratamientoC_check');
        $this->form_validation->set_rules('nombre', 'nombre', 'callback_letra_check');
        $this->form_validation->set_rules('apellido1', 'primer apellido', 'callback_letra_check');
        $this->form_validation->set_rules('apellido2', 'segundo apellido', 'callback_letra_check');
        $this->form_validation->set_rules('movil', 'teléfono móvil', 'callback_telefono_check');
        $this->form_validation->set_rules('fijo', 'teléfono fijo', 'callback_telefono_check');
        $this->form_validation->set_rules('email', 'correo electrónico', 'valid_email');
        $this->form_validation->set_rules('tipo_via', 'tipo de vía', 'callback_tipoViaC_check');
        $this->form_validation->set_rules('direccion', 'dirección', 'callback_letra_check');
        $this->form_validation->set_rules('numero', 'número', 'callback_numero_check');
        $this->form_validation->set_rules('piso', 'piso', 'callback_numero_check');
        $this->form_validation->set_rules('puerta', 'puerta', 'callback_puerta_check');
        $this->form_validation->set_rules('codigo_postal', 'código postal', 'callback_cp_check');
        $this->form_validation->set_rules('poblacion', 'población', 'callback_letra_check');
        $this->form_validation->set_rules('provincia', 'provincia', 'callback_provincia_check');
        $this->form_validation->set_rules('twitter', 'Twitter', 'callback_url_check');
        $this->form_validation->set_rules('facebook', 'Facebook', 'callback_url_check');
        $this->form_validation->set_rules('instagram', 'Instagram', 'callback_url_check');
        $this->form_validation->set_rules('nombre_empresa', 'empresa', 'callback_letra_check');
        $this->form_validation->set_rules('cif', 'CIF', 'callback_dni_check');
        $this->form_validation->set_rules('tipo', 'tipo de contacto', 'callback_tipoContacto_check');
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
