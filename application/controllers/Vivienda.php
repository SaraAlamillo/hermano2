<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once __DIR__ . '/Main.php';

class Vivienda extends Main {

    public function __construct() {
        parent::__construct();
        $this->load->model('Vivienda_model');
    }

    public function index() {
        $this->lista();
    }

    public function lista() {
        $parametros = [
            'listado' => $this->Vivienda_model->listarTodo(),
            "mensaje" => $this->session->flashdata("mensaje")
        ];

        $this->vista($this->load->view('vivienda/Lista', $parametros, TRUE), 'vivienda');
    }

    public function cambio($idVivienda) {
        if ($this->input->post()) {
            $this->Vivienda_model->cambio($idVivienda, $this->input->post('Observaciones'));
            $this->session->set_flashdata("mensaje", 'Se han realizado las cambios correctamente');
            redirect(site_url("Vivienda"));
        } else {
            $parametros = [
                'vivienda' => $this->Vivienda_model->listarUno($idVivienda)
            ];

            $this->vista($this->load->view('vivienda/Cambio', $parametros, TRUE), 'vivienda');
        }
    }

    public function nueva() {
        if ($this->input->post()) {
            $this->vivienda_model->alta($this->input->post());
            $this->session->set_flashdata("mensaje", 'Se ha añadido la vivienda correctamente');
            redirect(site_url("Vivienda"));
        } else {
            $this->load->helper('Form');

            $parametros = [
                'lisBarriada' => $this->Vivienda_model->listarBarriada(),
                'lisLinea' => $this->Vivienda_model->listarLinea(),
                'lisNumero' => $this->Vivienda_model->listarNumero()
            ];

            $this->vista($this->load->view('vivienda/Nueva', $parametros, TRUE), 'vivienda');
        }
    }

}
