<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once __DIR__ . '/Main.php';

class Remesa extends Main {

    public function __construct() {
        parent::__construct();
        $this->load->model('Remesa_model');
    }

    public function index() {
        $this->lista();
    }

    public function lista() {
        $parametros = [
            'listado' => $this->Remesa_model->listar(),
            "alerta" => $this->session->flashdata("alerta")
        ];

        $this->vista($this->load->view('remesa/Lista', $parametros, TRUE), 'remesa');
    }

    public function insertar() {
        if ($this->input->post()) {
            $this->Remesa_model->alta($this->input->post());
            $this->session->set_flashdata("alerta", ['mensaje' => 'Se ha añadido la remesa correctamente', 'tipo' => 'success']);
            redirect(site_url("Remesa"));
        } else {
            $this->vista($this->load->view('remesa/Nueva', NULL, TRUE), 'remesa');
        }
    }

    public function cambiar($id) {
        if ($this->input->post()) {
            $this->Remesa_model->cambio($this->input->post(), $id);
            $this->session->set_flashdata("alerta", ['mensaje' => 'Se han realizado las cambios correctamente', 'tipo'=> 'success']);
            redirect(site_url("Remesa"));
        } else {
            $parametros = [
                'remesa' => $this->Remesa_model->listaUno($id)
            ];
            $this->vista($this->load->view('remesa/Cambio', $parametros, TRUE), 'remesa');
        }
    }

    public function elimina($idRemesa) {
        if ($this->Remesa_model->tieneCuotas($idRemesa)) {
            $this->session->set_flashdata("alerta", ['mensaje' => 'No se puede eliminar una remesa con cuotas asociadas', 'tipo' => 'warning']);
            redirect(site_url("Remesa"));
        } else {
            if ($this->input->post()) {
                if ($this->input->post('eliminar') == 'Si') {
                    $this->Remesa_model->elimina($idRemesa);
                    $this->session->set_flashdata("alerta", ['mensaje' => 'Se ha eliminado la remesa correctamente','tipo' => 'success']);
                    redirect(site_url("Remesa"));
                } else {
                    redirect(site_url("Remesa"));
                }
            } else {
                $parametros = [
                    'datos' => $this->Remesa_model->listaUno($idRemesa),
                    'baja' => 'una remesa'
                ];
            
            $this->load->helper('bd');
            
                $this->vista($this->load->view('Confirmar_eliminacion', $parametros, TRUE), 'remesa');
            }
        }
    }

}
