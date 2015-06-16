<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {
	protected $rolActual;	

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

}
