<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index() {
        $this->load->view('Menu');
    }

    public function vista($contenido, $seccionActiva) {
        $parametros = [
            'contenido' => $contenido,
            'activo' => $seccionActiva
        ];

        $this->load->view('Plantilla', $parametros);
    }

}
