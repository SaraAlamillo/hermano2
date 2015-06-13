<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once __DIR__ . '/Main.php';

class Hermano extends Main {

    public function __construct() {
        parent::__construct();
        $this->load->model('Hermano_model');
    }

    public function index() {
        $this->lista();
    }

    public function lista() {
        $parametros = [
            'listado' => $this->Hermano_model->lista(),
            "alerta" => $this->session->flashdata("alerta")
        ];

        $this->vista($this->load->view('hermano/Lista', $parametros, TRUE), 'hermano');
    }

    public function detalle($idHermano) {
        $this->load->model('Vivienda_model');

        $parametros = [
            'hermano' => $this->Hermano_model->listaUno($idHermano)
        ];

        $parametros['hermano']->vivienda = $this->Vivienda_model->listarUno($parametros['hermano']->vivienda);

        $this->vista($this->load->view('hermano/Detalle', $parametros, TRUE), 'hermano');
    }

    public function cambio($idHermano) {
        if ($this->input->post()) {
            $this->load->helper('Datos');

            $this->Hermano_model->cambia($idHermano, quitaDatoVacio($this->input->post()));
            $this->session->set_flashdata("alerta", ['mensaje' => 'Se han realizado las cambios correctamente', 'tipo' => 'success']);
            redirect(site_url("Hermano"));
        } else {
            $this->load->model('Vivienda_model');
            $this->load->model('Provincia_model');

            $viviendas = $this->Vivienda_model->listarTodo();
            $parametros['viviendas'] = [];

            foreach ($viviendas as $v) {
                $aux = [
                    'id' => $v->idVivienda,
                    'nombre' => 'Barriada: ' . $v->Barriada . ' - Línea: ' . $v->Linea . ' - Número: ' . $v->Numero
                ];
                array_push($parametros['viviendas'], $aux);
            }

            $parametros['hermano'] = $this->Hermano_model->listaUno($idHermano);
            $parametros['hermano']->provincia = $this->Provincia_model->getNombre($parametros['hermano']->provincia);
            $parametros['lisTipoPago'] = $this->Hermano_model->listarTipoPago();
            $parametros['lisProvincia'] = $this->Provincia_model->listar();
            $parametros['lisTratamiento'] = $this->Hermano_model->listarTratamiento();
            $parametros['lisTipoVia'] = $this->Hermano_model->listarTipoVia();
            $parametros['lisFamilia'] = $this->Hermano_model->listarFamilia();

            $this->load->helper('Form');

            $this->vista($this->load->view('hermano/Cambio', $parametros, TRUE), 'hermano');
        }
    }

    public function nuevo() {
        if ($this->input->post()) {
            $this->load->helper('Datos');

            $this->Hermano_model->agrega(quitaDatoVacio($this->input->post()));
            $this->session->set_flashdata("alerta", ['mensaje' => 'Se ha añadido el hermano correctamente', 'tipo' => 'success']);
            redirect(site_url("Hermano"));
        } else {
            $this->load->model('Vivienda_model');
            $this->load->model('Provincia_model');

            $parametros = [
                'lisTratamiento' => $this->Hermano_model->listarTratamiento(),
                'lisTipoVia' => $this->Hermano_model->listarTipoVia(),
                'lisTipoPago' => $this->Hermano_model->listarTipoPago(),
                'lisProvincia' => $this->Provincia_model->listar(),
                'lisFamilia' => $this->Hermano_model->listarFamilia()
            ];

            $viviendas = $this->Vivienda_model->listarTodo();
            $parametros['viviendas'] = [];

            foreach ($viviendas as $v) {
                $aux = [
                    'id' => $v->idVivienda,
                    'nombre' => 'Barriada: ' . $v->Barriada . ' - Línea: ' . $v->Linea . ' - Número: ' . $v->Numero
                ];
                array_push($parametros['viviendas'], $aux);
            }

            $this->load->helper('Form');

            $this->vista($this->load->view('hermano/Nueva', $parametros, TRUE), 'hermano');
        }
    }

    public function elimina($idHermano) {
        if ($this->input->post()) {
            if ($this->input->post('eliminar') == 'Si') {
                echo $this->Hermano_model->elimina($idHermano);
                $this->session->set_flashdata("alerta", ['mensaje' => 'Se ha eliminado el hermano correctamente', 'tipo' => 'success']);
                redirect(site_url("Hermano"));
            } else {
                redirect(site_url("Hermano"));
            }
        } else {
            $parametros = [
                'datos' => $this->Hermano_model->listaUno($idHermano),
                'baja' => 'un hermano'
            ];
            
            $this->load->helper('bd');
            
            $this->vista($this->load->view('Confirmar_eliminacion', $parametros, TRUE), 'hermano');
        }
    }

    public function medallas() {
        if ($this->input->post()) {
            $this->load->library('Sorteo');
            $this->sorteo->generar($this->input->post('hermanos'));
        } else {
            $parametros = [
                'listado' => $this->Hermano_model->lista(['medalla = ' => 0])
            ];

            $this->vista($this->load->view('hermano/Sorteo', $parametros, TRUE), 'medalla');
        }
    }

}
