<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Modelo para el módulo de usuarios
 *
 * @author Sara Alamillo Arroyo
 */
class Usuario_model extends CI_Model {

    public function usuarioCorrecto($datos) {
        $this->db->where('nombre', $datos['usuario']);
        $this->db->where('clave', $datos['clave']);
        if ($this->db->count_all_results('usuario') > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getRol($datos) {
        $this->db->where('nombre', $datos['usuario']);
        $this->db->where('clave', $datos['clave']);
        $consulta = $this->db->get('usuario');
        $resultado = $consulta->row();

        return $resultado->rol;
    }

    public function insertar($nombre, $clave, $rol) {
        $datos = [
            'nombre' => $nombre,
            'clave' => $clave,
            'rol' => $rol
        ];
        $this->db->insert('usuario', $datos);
    }

}
