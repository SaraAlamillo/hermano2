<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Constructor_model extends CI_Model {

    public function obtenerCampos($tabla) {
        $campos = [
            'hermano' => ['idHermano', 'vivienda', 'tratamiento', 'nombre', 'apellido1', 'apellido2', 'fecha_nacimiento', 'dni', 'tipo_via', 'direccion', 'numero', 'piso', 'puerta', 'codigo_postal', 'poblacion', 'movil', 'fijo', 'email', 'twitter', 'facebook', 'instagram', 'tipo', 'cuenta_corriente', 'familia', 'provincia', 'medalla'],
            'pago' => ['idHermano', 'idRemesa', 'cuota1', 'cuota2'],
            'remesa' => ['idRemesa', 'descripcion', 'anio']
        ];

        return $campos[$tabla];
    }

    public function consulta($campos) {
        $this->db->distinct();
        $this->db->select($campos);
        $this->db->from('remesa');
        $this->db->join('pago', 'remesa.idRemesa = pago.idRemesa', 'full');
        $this->db->join('hermano', 'hermano.idHermano = pago.idHermano', 'full');
        $consulta = $this->db->get();

        return $consulta->result();
    }

}
