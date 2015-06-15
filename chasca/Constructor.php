<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once __DIR__ . '/Main.php';

class Constructor extends Main {

    public function __construct() {
        parent::__construct();
        $this->load->model('Constructor_model');
    }

    public function index() {
        $this->constructor();
    }

    public function constructor() {
        $this->load->helper('Bd');

        if ($this->input->post()) {
            if (!is_null($this->input->post('hermano'))) {
                $campos['hermano'] = implode(', ', $this->input->post('hermano'));
            }
            if (!is_null($this->input->post('pago'))) {
                $campos['pago'] = implode(', ', $this->input->post('pago'));
            }
            if (!is_null($this->input->post('remesa'))) {
                $campos['remesa'] = implode(',', $this->input->post('remesa'));
            }

            $campos = implode(', ', $campos);

            $parametros = [
                'resultado' => $this->Constructor_model->consulta($campos)
            ];

            $this->vista($this->load->view('constructor/Resultados', $parametros, TRUE), 'constructor');
        } else {
            $parametros = [
                'campos' => [
                    'hermano' => $this->Constructor_model->obtenerCampos('hermano'),
                    'pago' => $this->Constructor_model->obtenerCampos('pago'),
                    'remesa' => $this->Constructor_model->obtenerCampos('remesa')
                ]
            ];

            $this->vista($this->load->view('constructor/Constructor', $parametros, TRUE), 'constructor');
        }
    }

}
