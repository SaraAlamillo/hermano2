<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Modelo para el módulo de viviendas
 *
 * @author Sara Alamillo Arroyo
 */
class Vivienda_model extends CI_Model {

    function alta($datos) {
        $this->db->insert('vivienda', $datos);
    }

    function cambio($idVivienda, $observaciones) {
        $this->db->update('vivienda', ['Observaciones' => $observaciones], ['idVivienda' => $idVivienda]);
    }

    function listarTodo($criterios = NULL) {
        if (!is_null($criterios)) {
            $this->db->where($criterios);
        }
        $consulta = $this->db->get('vivienda');
        return $consulta->result();
    }

    public function listarUno($idVivienda) {
        $this->db->where('idVivienda', $idVivienda);
        $consulta = $this->db->get('vivienda');
        return $consulta->row();
    }

    public function existe($barriada, $linea, $numero) {
        $viviendas = $this->listarTodo(['Barriada' => $barriada, 'Linea' => $linea, 'Numero' => $numero]);

        if (count($viviendas) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function listarBarriada() {
        $this->load->helper('Bd');
        return obtenerEnumerados('vivienda', 'Barriada');
    }

    public function listarLinea() {
        $this->load->helper('Bd');
        return obtenerEnumerados('vivienda', 'Linea');
    }

    public function listarNumero() {
        $this->load->helper('Bd');
        return obtenerEnumerados('vivienda', 'Numero');
    }

}
