<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once __DIR__ . '/Main.php';

class Contacto extends Main {

    public function __construct() {
        parent::__construct();
        $this->load->model('Contacto_model');
    }

    public function index($pagina = 1) {
        $this->lista($pagina);
    }

    public function lista($pagina) {
        $parametros = [
            'listado' => $this->Contacto_model->listarTodo($pagina),
            "alerta" => $this->session->flashdata("alerta"),
            'rolActual' => $this->rolActual,
            'paginador' => $this->paginar(site_url('Contacto/lista/'), $this->Contacto_model->total())
        ];

        $this->vista($this->load->view('contacto/Lista', $parametros, TRUE), 'contacto');
    }

    public function cambio($idContacto) {
        if ($this->rolActual == 'Administrador') {
            if ($this->input->post()) {
                $this->load->helper('Datos');

                $this->Contacto_model->cambio($idContacto, quitaDatoVacio($this->input->post()));
                $this->session->set_flashdata("alerta", ['mensaje' => 'Se han realizado las cambios correctamente', 'tipo' => 'success']);
                redirect(site_url("Contacto"));
            } else {
                $this->load->model('Provincia_model');

                $parametros = [
                    'lisTratamiento' => $this->Contacto_model->listarTratamiento(),
                    'lisTipoVia' => $this->Contacto_model->listarTipoVia(),
                    'lisTipo' => $this->Contacto_model->listaTipo(),
                    'lisProvincia' => $this->Provincia_model->listar(),
                    'contacto' => $this->Contacto_model->listarUno($idContacto)
                ];

                $this->load->helper('Form');

                $this->vista($this->load->view('contacto/Cambio', $parametros, TRUE), 'contacto');
            }
        } else {
            $this->session->set_flashdata("alerta", ['mensaje' => 'Debe ser <b>administrador</b> para modificar un contacto', 'tipo' => 'info']);
            redirect(site_url('Contacto'));
        }
    }

    public function nuevo() {
        if ($this->rolActual == 'Administrador') {
            if ($this->input->post()) {
                $this->load->helper('Datos');

                $this->contacto_model->alta(quitaDatoVacio($this->input->post()));
                $this->session->set_flashdata("alerta", ['mensaje' => 'Se ha añadido la vivienda correctamente', 'tipo' => 'success']);
                redirect(site_url("Contacto"));
            } else {
                $this->load->model('Provincia_model');

                $parametros = [
                    'lisTratamiento' => $this->Contacto_model->listarTratamiento(),
                    'lisTipoVia' => $this->Contacto_model->listarTipoVia(),
                    'lisTipo' => $this->Contacto_model->listaTipo(),
                    'lisProvincia' => $this->Provincia_model->listar()
                ];

                $this->load->helper('Form');

                $this->vista($this->load->view('contacto/Nueva', $parametros, TRUE), 'contacto');
            }
        } else {
            $this->session->set_flashdata("alerta", ['mensaje' => 'Debe ser <b>administrador</b> para crear un contacto', 'tipo' => 'info']);
            redirect(site_url('Contacto'));
        }
    }

    public function detalle($idContacto) {
        $this->load->model('Provincia_model');

        $parametros = [
            'contacto' => $this->Contacto_model->listarUno($idContacto)
        ];

        $parametros['contacto']->tipo = $this->Contacto_model->nombreTipo($parametros['contacto']->tipo);
        $parametros['contacto']->provincia = $this->Provincia_model->getNombre($parametros['contacto']->provincia);

        $this->vista($this->load->view('contacto/Detalle', $parametros, TRUE), 'contacto');
    }

    public function eliminar($idContacto) {
        if ($this->rolActual == 'Administrador') {
            if ($this->input->post()) {
                if ($this->input->post('eliminar') == 'Si') {
                    $this->Contacto_model->eliminar($idContacto);
                    $this->session->set_flashdata("alerta", ['mensaje' => 'Se ha eliminado el contacto correctamente', 'tipo' => 'success']);
                    redirect(site_url("Contacto"));
                } else {
                    redirect(site_url("Contacto"));
                }
            } else {
                $parametros = [
                    'datos' => $this->Contacto_model->listarUno($idContacto),
                    'baja' => 'un contacto de la agenda'
                ];

                $this->load->helper('bd');

                $this->vista($this->load->view('Confirmar_eliminacion', $parametros, TRUE), 'contacto');
            }
        } else {
            $this->session->set_flashdata("alerta", ['mensaje' => 'Debe ser <b>administrador</b> para eliminar un contacto', 'tipo' => 'info']);
            redirect(site_url('Contacto'));
        }
    }

}
