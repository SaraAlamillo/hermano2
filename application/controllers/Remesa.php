<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once __DIR__ . '/Main.php';

class Remesa extends Main {

    public function __construct() {
        parent::__construct();
        $this->load->model('Remesa_model');
    }

    public function index($pagina = 0) {
        $this->lista($pagina);
    }

    public function lista($pagina = 0) {
        $parametros = [
            'listado' => $this->Remesa_model->listar(NULL, $pagina),
            "alerta" => $this->session->flashdata("alerta"),
            'rolActual' => $this->rolActual,
            'paginador' => $this->paginar(site_url('Remesa/lista/'), $this->Remesa_model->total())
        ];

        $this->vista($this->load->view('remesa/Lista', $parametros, TRUE), 'remesa');
    }

    public function insertar() {
        if ($this->rolActual == 'Administrador') {
            $this->load->helper('form');
           
            $this->load->library('Form_validation');

            if ($this->input->post()) {
                $this->load->helper('Datos');
                
                if ($this->form_validation->run('remesa')) {
                    $this->Remesa_model->alta(quitaDatoVacio($this->input->post()));
                    $this->session->set_flashdata("alerta", ['mensaje' => 'Se ha añadido la remesa correctamente', 'tipo' => 'success']);
                    redirect(site_url("Remesa"));
                }
            }
            $this->vista($this->load->view('remesa/Nueva', NULL, TRUE), 'remesa');
        } else {
            $this->session->set_flashdata("alerta", ['mensaje' => 'Debe ser <b>administrador</b> para crear una remesa', 'tipo' => 'info']);
            redirect(site_url('Remesa'));
        }
    }

    public function cambiar($id) {
        if ($this->rolActual == 'Administrador') {
            $this->load->helper('form');
           
            $this->load->library('Form_validation');

            if ($this->input->post()) {
                if ($this->form_validation->run('remesa')) {
                    $this->Remesa_model->cambio($this->input->post(), $id);
                    $this->session->set_flashdata("alerta", ['mensaje' => 'Se han realizado las cambios correctamente', 'tipo' => 'success']);
                    redirect(site_url("Remesa"));
                }
            }
            $parametros = [
                'remesa' => $this->Remesa_model->listaUno($id)
            ];
            $this->vista($this->load->view('remesa/Cambio', $parametros, TRUE), 'remesa');
        } else {
            $this->session->set_flashdata("alerta", ['mensaje' => 'Debe ser <b>administrador</b> para modificar una remesa', 'tipo' => 'info']);
            redirect(site_url('Remesa'));
        }
    }

    public function elimina($idRemesa) {
        if ($this->rolActual == 'Administrador') {
            if ($this->Remesa_model->tieneCuotas($idRemesa)) {
                $this->session->set_flashdata("alerta", ['mensaje' => 'No se puede eliminar una remesa con cuotas asociadas', 'tipo' => 'warning']);
                redirect(site_url("Remesa"));
            } else {
                if ($this->input->post()) {
                    if ($this->input->post('eliminar') == 'Si') {
                        $this->Remesa_model->elimina($idRemesa);
                        $this->session->set_flashdata("alerta", ['mensaje' => 'Se ha eliminado la remesa correctamente', 'tipo' => 'success']);
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
        } else {
            $this->session->set_flashdata("alerta", ['mensaje' => 'Debe ser <b>administrador</b> para eliminar una remesa', 'tipo' => 'info']);
            redirect(site_url('Remesa'));
        }
    }

}
