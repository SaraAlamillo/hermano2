<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index() {
        $this->vista($this->load->view('Menu', '', TRUE), 'home', TRUE);
    }

    public function vista($contenido, $seccionActiva, $menu = FALSE) {
        $parametros = [
            'contenido' => $contenido,
            'activo' => $seccionActiva,
            'menu' => $menu
        ];

        $this->load->view('Plantilla', $parametros);
    }

}
