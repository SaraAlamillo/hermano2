<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Modelo para la tabla de provincias
 *
 * @author Sara Alamillo Arroyo
 */
class Provincia_model extends CI_Model {

    public function listar() {
        $consulta = $this->db->get('provincia');
        return $consulta->result();
    }

    public function getNombre($idProvincia) {
        $this->db->where('idProvincia', $idProvincia);
        $consulta = $this->db->get('provincia');
        $resultado = $consulta->row();
        return $resultado->nombre;
    }

    public function getId($nombre) {
        $this->db->where('nombre', $nombre);
        $consulta = $this->db->get('provincia');
        $resultado = $consulta->row();
        return $resultado->idProvincia;
    }

}
