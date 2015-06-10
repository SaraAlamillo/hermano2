<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once __DIR__ . '/Main.php';

class Pago extends Main {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pago_model');
    }

    public function lista($idHermano) {
        $parametros = [
            'listado' => $this->Pago_model->lista(['hermano.idHermano = ' => $idHermano])
        ];

        $this->vista($this->load->view('pago/Lista', $parametros, TRUE), 'hermano');
    }

    public function registra($hermano = NULL, $anio = NULL, $descripcion = NULL) {
        echo '<pre>';
        print_r($this->Pago_model->plazos($hermano, $descripcion));
        echo '</pre>';
        /* if ($this->input->post()) {

          } else {
          $this->load->model('Hermano_model');
          $hermanos = [];

          foreach ($this->Hermano_model->lista() as $h) {
          array_push(
          $hermanos,
          [
          'id' => $h->idHermano,
          'nombre' => $h->nombre . ' ' . $h->apellido1 . ' ' . $h->apellido2
          ]
          );
          }

          $this->load->model('Remesa_model');

          $parametros = [
          'hermanos' => $hermanos,
          'anios' => $this->Remesa_model->anios(),
          'descripciones' => $this->Remesa_model->descripciones(is_null($anio) ? date('Y') : $anio),
          'seleccionado' => [
          'hermano' => $hermano,
          'anio' => $anio,
          'descripcion' => $descripcion
          ]
          ];


          if (!is_null($hermano) and ! is_null($descripcion)) {
          $this->load->model('Pago_model');
          $plazos = $this->Pago_model->plazos($hermano, $descripcion);

          $parametros['seleccionado']['cuota1'] = $plazos->cuota1;
          $parametros['seleccionado']['cuota2'] = $plazos->cuota2;
          } else {
          $parametros['seleccionado']['cuota1'] = date('d/m/Y');
          $parametros['seleccionado']['cuota2'] = date('d/m/Y');
          }


          $this->load->helper('Form');

          $this->vista($this->load->view('pago/Registro', $parametros, TRUE), 'registro');
          } */
    }

}
