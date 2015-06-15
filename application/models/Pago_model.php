<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Modelo para el módulo de pagos
 *
 * @author Sara Alamillo Arroyo
 */
class Pago_model extends CI_Model {

    public function lista($criterios = NULL) {
        $this->db->select('remesa.*, pago.*, hermano.idHermano, hermano.nombre, hermano.apellido1, hermano.apellido2');
        $this->db->from('remesa');
        $this->db->join('pago', 'remesa.idRemesa = pago.idRemesa');
        $this->db->join('hermano', 'hermano.idHermano = pago.idHermano');
        if (!is_null($criterios)) {
            $this->db->where($criterios);
        }
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function agrega($datos) {
        $this->db->insert('pago', $datos);
    }

    public function agregaCuota($idHermano, $idRemesa, $cuota, $fecha) {
        $this->db->where('idHermano', $idHermano);
        $this->db->where('idRemesa', $idRemesa);
        $this->db->update('pago', [$cuota => $fecha]);
    }

    public function plazos($idHermano, $idRemesa) {
        $this->db->select('cuota1, cuota2');
        $this->db->from('pago');
        $this->db->where(['idHermano' => $idHermano, 'idRemesa' => $idRemesa]);
        $consulta = $this->db->get();

        return $consulta->row();
    }

    public function listaMorosos() {
        $this->load->model('Hermano_model');

        $morosos = $this->lista('cuota1 is null or cuota2 is null');
        $hermanos = $this->lista();

        $return = [];

        foreach ($hermanos as $h) {
            $debe = FALSE;

            foreach ($morosos as $m) {
                if ($m->idHermano == $h->idHermano) {
                    $debe = TRUE;
                    break;
                }
            }

            $return[$h->idHermano] = $debe;
        }

        return $return;
    }

}
