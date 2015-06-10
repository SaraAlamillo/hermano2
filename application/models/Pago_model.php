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

    public function plazos($idHermano, $idRemesa) {
        $this->db->select('cuota1, cuota2');
        $this->db->from('pago');
        $this->db->where(['idHermano' => $idHermano, 'idRemesa' => $idRemesa]);
        $consulta = $this->db->get();

        return $consulta->row();
    }

}
