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
            'listado' => $this->Pago_model->lista(['hermano.idHermano = ' => $idHermano]),
            "alerta" => $this->session->flashdata("alerta"),
			'rolActual' => $this->rolActual
        ];

        $this->vista($this->load->view('pago/Lista', $parametros, TRUE), 'hermano');
    }

    public function registra($hermano = NULL, $anio = NULL, $descripcion = NULL) {
		if ($this->rolActual == 'Administrador') {
        $alerta = NULL;

        if ($this->input->post()) {
            $contador = 0;

            if ($this->input->post('cuota1')) {
                $this->Pago_model->agregaCuota($hermano, $descripcion, 'cuota1', $this->input->post('cuota1'));
                $contador++;
            }

            if ($this->input->post('cuota2')) {
                $this->Pago_model->agregaCuota($hermano, $descripcion, 'cuota2', $this->input->post('cuota2'));
                $contador++;
            }

            if ($contador == 0) {
                $alerta = [
                    'tipo' => 'danger',
                    'mensaje' => 'No se ha registrado ningún pago.'
                ];
            } else {
                $alerta = [
                    'tipo' => 'success',
                    'mensaje' => 'Se ha registrado el pago correctamente.'
                ];
            }
        }
        $this->load->model('Hermano_model');
        $hermanos = [];

        foreach ($this->Hermano_model->lista() as $h) {
            array_push(
                    $hermanos, [
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
                'anio' => $anio == '' ? 'Año' : $anio,
                'descripcion' => $descripcion
            ],
            'alerta' => $alerta
        ];


        if (!is_null($hermano) and !is_null($descripcion)) {
            $this->load->model('Pago_model');
            $plazos = $this->Pago_model->plazos($hermano, $descripcion);

            $parametros['seleccionado']['cuota1'] = $plazos->cuota1;
            $parametros['seleccionado']['cuota2'] = $plazos->cuota2;
        }

        $this->load->helper('Form');

        $this->vista($this->load->view('pago/Registro', $parametros, TRUE), 'registro');
		}else {
            $this->session->set_flashdata("alerta", ['mensaje' => 'Debe ser <b>administrador</b> para registrar un pago', 'tipo' => 'info']);
			redirect(site_url('Hermano'));
		}
    }

}
