<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Modelo para el módulo de hermanos
 *
 * @author Sara Alamillo Arroyo
 */
class Hermano_model extends CI_Model {

    public function lista($criterios = NULL, $limit = NULL) {
        if (!is_null($limit)) {
            $this->db->limit(Main::MaxPorPag, $limit);
        }
        if (!is_null($criterios)) {
            $this->db->where($criterios);
        }
        $consulta = $this->db->get('hermano');
        return $consulta->result();
    }

    public function listaUno($idHermano) {
        $this->db->where('idHermano', $idHermano);
        $consulta = $this->db->get('hermano');
        return $consulta->row();
    }

    public function agrega($datos) {
        $this->db->insert('hermano', $datos);

        $idHermano = $this->ultimoCreado();

        $this->load->model('Remesa_model');
        $remesas = $this->Remesa_model->listar(['anio' => date('Y')]);

        $this->load->model('Pago_model');

        foreach ($remesas as $r) {
            $this->Pago_model->agrega(['idHermano' => $idHermano, 'idRemesa' => $r->idRemesa]);
        }
    }

    public function ultimoCreado() {
        $this->db->select_max('idHermano');
        $consulta = $this->db->get('hermano');
        $resultado = $consulta->row();

        return $resultado->idHermano;
    }

    public function cambia($idHermano, $datos) {
        $this->db->update('hermano', $datos, ['idHermano' => $idHermano]);
    }

    public function elimina($idHermano) {
        $this->recopilarImpagos($idHermano);

        $this->load->model('Pago_model');
        $pagos = $this->Pago_model->lista(['hermano.idHermano = ' => $idHermano]);

        foreach ($pagos as $p) {
            $this->db->where('idHermano', $idHermano);
            $this->db->where('idRemesa', $p->idRemesa);
            $this->db->delete('pago');
            $this->db->where('idCuota', $p->idCuota);
            $this->db->delete('cuota');
        }
        $this->db->where('idHermano', $idHermano);
        $this->db->delete('hermano');

        $this->db->select_max('idHermano');
        $consulta = $this->db->get('hermano');
        $consulta = $consulta->row();
        $idMax = $consulta->idHermano;

        for ($i = $idHermano; $i < $idMax; $i++) {
            $this->db->update('hermano', ['idHermano' => $i], ['idHermano' => ($i + 1)]);
        }

        $this->db->query('ALTER TABLE hermano AUTO_INCREMENT = ' . $idMax);
    }

    public function recopilarImpagos($idHermano) {
        $datosHermano = $this->listaUno($idHermano);

        $this->db->from('pago');
        $this->db->join('cuota', 'pago.idCuota = cuota.idCuota');
        $this->db->where("idHermano = $idHermano and (plazo1 is null or plazo2 is null)");
        $datosPago = $this->db->get();

        $impagos = "";

        foreach ($datosPago->result() as $d) {
            $plazos = "";

            if (empty($d->plazo1)) {
                $plazos = "Plazo 1";
            }

            if (empty($d->plazo2)) {
                if ($plazos != "") {
                    $plazos .= " y plazo 2";
                } else {
                    $plazos = "Plazo 2";
                }
            }

            if ($plazos != "") {
                $impagos .= "Remesa {$d->idRemesa}: $plazos\n";
            }
        }

        if ($impagos != "") {
            $datosBaja = [
                'nombre' => $datosHermano->nombre,
                'apellido1' => $datosHermano->apellido1,
                'apellido2' => $datosHermano->apellido2,
                'dni' => $datosHermano->dni,
                'pendiente' => $impagos
            ];

            $this->db->insert('baja', $datosBaja);
        }
    }

    public function listarTipoPago() {
        $this->load->helper('Bd');
        return obtenerEnumerados('hermano', 'tipo');
    }

    public function listarTratamiento() {
        $this->load->helper('Bd');
        return obtenerEnumerados('hermano', 'tratamiento');
    }

    public function listarTipoVia() {
        $this->load->helper('Bd');
        return obtenerEnumerados('hermano', 'tipo_via');
    }

    public function listarFamilia() {
        $this->load->helper('Bd');
        return obtenerEnumerados('hermano', 'familia');
    }

    public function total() {
        return $this->db->count_all('hermano');
    }

}
