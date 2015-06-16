<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Remesa_model extends CI_Model {

    public function alta($datos) {
        $this->db->insert('remesa', $datos);

        $idRemesa = $this->ultimaCreada();

        $this->load->model('Hermano_model');
        $hermanos = $this->Hermano_model->lista();

        $this->load->model('Pago_model');

        foreach ($hermanos as $h) {
            $this->Pago_model->agrega(['idHermano' => $h->idHermano, 'idRemesa' => $idRemesa]);
        }
    }

    public function ultimaCreada() {
        $this->db->select_max('idRemesa');
        $consulta = $this->db->get('remesa');
        $resultado = $consulta->row();

        return $resultado->idRemesa;
    }

    public function cambio($datos, $id) {
        $this->db->update('remesa', $datos, ['idRemesa' => $id]);
    }

    public function listar($criterios = NULL, $limit = NULL) {
        if (!is_null($limit)) {
            $this->db->limit($limit, Main::MaxPorPag);
        }
        if (!is_null($criterios)) {
            $this->db->where($criterios);
        }
        $consulta = $this->db->get('remesa');

        return $consulta->result();
    }

    public function listaUno($id) {
        $this->db->where('idRemesa', $id);
        $consulta = $this->db->get('remesa');
        return $consulta->row();
    }

    public function tieneCuotas($idRemesa) {
        $this->db->where('idRemesa', $idRemesa);
        $this->db->where('cuota1 is not null or cuota2 is not null');
        $this->db->from('pago');

        if ($this->db->count_all_results() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function elimina($idRemesa) {
        $this->db->delete('pago', ['idRemesa' => $idRemesa]);
        $this->db->delete('remesa', ['idRemesa' => $idRemesa]);
    }

    public function anios() {
        $this->db->distinct();
        $this->db->select('anio');
        $this->db->order_by('anio', 'desc');
        $consulta = $this->db->get('remesa');

        return $consulta->result();
    }

    public function descripciones($anio) {
        $this->db->select('descripcion, idRemesa');
        $this->db->where('anio', $anio);
        $this->db->order_by('anio', 'desc');
        $consulta = $this->db->get('remesa');

        return $consulta->result();
    }

    public function total() {
        return $this->db->count_all('remesa');
    }

}
