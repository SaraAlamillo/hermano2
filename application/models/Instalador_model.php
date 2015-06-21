<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Modelo para el módulo de contactos
 *
 * @author Sara Alamillo Arroyo
 */
class Instalador_model extends CI_Model {
    public function mostrarTablas() {
        $tablas = [];
        
        $consulta = $this->db->query("show tables from {$this->db->select()->database}");
        
        foreach ($consulta->result() as $registro) {
            foreach ($registro as $campo) {
                $tablas[] = $campo;
            }
        }
        
        return $tablas;
    }
    
    public function eliminarTablas($tablas) {
        $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
        foreach ($tablas as $nombre) {
            $this->db->query("drop table $nombre cascade");
        }
    }
    public function importSql($fichero) {
        $lines = file($fichero);
        foreach ($lines as $key => $line) {
            if (substr($line, 0, 2) == "--") {
                unset($lines[$key]);
            }
        }
        $lines = array_values($lines);
        $lines = implode(" ", $lines);
        $lines = explode(";", $lines);
        
        
        foreach ($lines as &$line) {
            $line = trim($line);
            if ($line != '') {
                $this->db->query($line);
            }
        }
    }
}