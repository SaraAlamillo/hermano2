<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once __DIR__ . '/Main.php';

class Vivienda extends Main {

    public function __construct() {
        parent::__construct();
        $this->load->model('Vivienda_model');
    }

    public function index($pagina = 0) {
        $this->lista($pagina);
    }

    public function lista($pagina = 0) {
        $parametros = [
            'listado' => $this->Vivienda_model->listarTodo(NULL, $pagina),
            "alerta" => $this->session->flashdata("alerta"),
            'rolActual' => $this->rolActual,
            'paginador' => $this->paginar(site_url('Vivienda/lista/'), $this->Vivienda_model->total())
        ];

        $this->vista($this->load->view('vivienda/Lista', $parametros, TRUE), 'vivienda');
    }

    public function cambio($idVivienda) {
        if ($this->rolActual == 'Administrador') {
            if ($this->input->post()) {
                $this->Vivienda_model->cambio($idVivienda, $this->input->post('Observaciones'));
                $this->session->set_flashdata("alerta", ['mensaje' => 'Se han realizado las cambios correctamente', 'tipo' => 'success']);
                redirect(site_url("Vivienda"));
            } else {
                $parametros = [
                    'vivienda' => $this->Vivienda_model->listarUno($idVivienda)
                ];

                $this->vista($this->load->view('vivienda/Cambio', $parametros, TRUE), 'vivienda');
            }
        } else {
            $this->session->set_flashdata("alerta", ['mensaje' => 'Debe ser <b>administrador</b> para modificar una vivienda', 'tipo' => 'info']);
            redirect(site_url('Vivienda'));
        }
    }

    public function nueva() {
        if ($this->rolActual == 'Administrador') {
            if ($this->input->post()) {
                $this->Vivienda_model->alta($this->input->post());
                $this->session->set_flashdata("alerta", ['mensaje' => 'Se ha añadido la vivienda correctamente', 'tipo' => 'success']);
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
        } else {
            $this->session->set_flashdata("alerta", ['mensaje' => 'Debe ser <b>administrador</b> para crear una vivienda', 'tipo' => 'info']);
            redirect(site_url('Vivienda'));
        }
    }

}
