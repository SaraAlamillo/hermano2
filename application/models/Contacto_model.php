<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Modelo para el módulo de contactos
 *
 * @author Sara Alamillo Arroyo
 */
class Contacto_model extends CI_Model {

    function alta($datos) {
        $this->db->insert('contacto', $datos);
    }

    function cambio($idContacto, $datos) {
        $this->db->update('contacto', $datos, ['idContacto' => $idContacto]);
    }

    function listarTodo() {
        $consulta = $this->db->get('contacto');
        return $consulta->result();
    }

    public function listarUno($idContacto) {
        $this->db->where('idContacto', $idContacto);
        $consulta = $this->db->get('contacto');
        return $consulta->row();
    }

    public function existeTipo($tipo) {
        $this->db->where('tipo', $tipo);
        $this->db->from('tipo_contacto');
        if ($this->db->count_all_results() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function altaTipo($datos) {
        $this->db->insert('tipo_contacto', $datos);
    }

    public function listaTipo() {
        $consulta = $this->db->get('tipo_contacto');
        return $consulta->result();
    }

    public function listarTratamiento() {
        $this->load->helper('Bd');
        return obtenerEnumerados('contacto', 'tratamiento');
    }

    public function listarTipoVia() {
        $this->load->helper('Bd');
        return obtenerEnumerados('contacto', 'tipo_via');
    }

    public function nombreTipo($id) {
        $this->db->where('idTipo_Contacto', $id);
        $consulta = $this->db->get('Tipo_Contacto');
        $resultado = $consulta->row();
        return $resultado->tipo;
    }

    public function eliminar($id) {
        $this->db->where('idContacto', $id);
        $this->db->delete('contacto');
    }

}
