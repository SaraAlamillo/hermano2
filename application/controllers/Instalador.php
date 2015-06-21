<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Instalador extends CI_Controller {

    public function index() {
        $this->paso1();
    }

    public function paso1() {
        $this->load->view('instalador/plantilla', ['contenido' => $this->load->view('instalador/paso1', '', TRUE)]);
    }

    public function paso2() {
        $parametros = [
            'alerta' => NULL
        ];

        if ($this->input->post()) {
            $enBlanco = false;
            foreach ($this->input->post() as $clave => $valor) {
                if ($valor == '' && $clave != 'clave') {
                    $parametros['alerta'] = [
                        'tipo' => 'danger',
                        'mensaje' => 'Debe rellenar todos los campos'
                    ];

                    $enBlanco = true;
                }
            }
            if (!$enBlanco) {
                $conexion = @new mysqli($this->input->post('servidor'), $this->input->post('usuario'), $this->input->post('clave'));
                if ($conexion) {
                    if (@$conexion->select_db($this->input->post('bd'))) {
                        $fichero = fopen(__DIR__ . "/../config/database.php", "a");
                        fwrite($fichero, PHP_EOL);
                        fwrite($fichero, '$db["default"]["username"] = "' . $this->input->post('usuario') . '";' . PHP_EOL);
                        fwrite($fichero, '$db["default"]["hostname"] = "' . $this->input->post('servidor') . '";' . PHP_EOL);
                        fwrite($fichero, '$db["default"]["password"] = "' . $this->input->post('clave') . '";' . PHP_EOL);
                        fwrite($fichero, '$db["default"]["database"] = "' . $this->input->post('bd') . '";' . PHP_EOL);
                        fclose($fichero);
                        redirect(site_url('Instalador/paso3'));
                    } else {
                        $parametros['alerta'] = [
                            'tipo' => 'danger',
                            'mensaje' => 'No se puede conectar con la base de datos'
                        ];
                    }
                } else {
                    $parametros['alerta'] = [
                        'tipo' => 'danger',
                        'mensaje' => 'No se puede establecer la conexión con el servidor'
                    ];
                }
            }
        }
        $this->load->view('instalador/plantilla', ['contenido' => $this->load->view('instalador/paso2', $parametros, TRUE)]);
    }

    public function paso3() {
        $this->load->model("Instalador_model");

        $parametros = [
            'tablas' => $this->Instalador_model->mostrarTablas()
        ];

        if ($this->input->post()) {
            if ($this->input->post('enviar') == 'Eliminar antiguas') {
                $this->Instalador_model->eliminarTablas($parametros['tablas']);
                $this->Instalador_model->importSql(__DIR__ . '/../install/hermano.sql');
            } else if ($this->input->post('enviar') == 'Utilizar actuales') {
                
            } else if ($this->input->post('enviar') == 'Crear tablas') {
                $this->Instalador_model->importSql(__DIR__ . '/../install/hermano.sql');
            }
            redirect(site_url('Instalador/paso4'));
        }

        $this->load->view('instalador/plantilla', ['contenido' => $this->load->view('instalador/paso3', $parametros, TRUE)]);
    }

    public function paso4() {
        $parametros = [
            'alerta' => NULL
        ];

        if ($this->input->post()) {
            if ($this->input->post("user-admin") == '' || $this->input->post("user-normal") == '') {
                $parametros['alerta'] = [
                    'tipo' => 'danger',
                    'mensaje' => 'Se deben introducir al menos un nombre para los usuarios'
                ];
            } else {
                $this->load->model('Usuario_model');
                $this->Usuario_model->insertar($this->input->post('user-admin'), $this->input->post('clave-admin'), 'Administrador');
                $this->Usuario_model->insertar($this->input->post('user-normal'), $this->input->post('clave-normal'), 'Usuario');
                
                 $this->session->set_flashdata("alerta", ['mensaje' => 'Se ha instalado la aplicación correctamente', 'tipo' => 'success']);
                redirect(site_url('Main'));
            }
        }

        $this->load->view('instalador/plantilla', ['contenido' => $this->load->view('instalador/paso4', $parametros, TRUE)]);
    }


}
