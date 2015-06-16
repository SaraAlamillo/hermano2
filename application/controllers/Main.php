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

}
