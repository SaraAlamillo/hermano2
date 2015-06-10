<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// Incluimos el archivo fpdf
require_once APPPATH . "/third_party/fpdf/Fpdf.php";

//Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
class Sorteo extends FPDF {

    public function generar(array $participantes) {
        $this->Sorteo = new Sorteo();
        $this->Sorteo->AddPage();
        $this->Sorteo->AliasNbPages();
        $this->Sorteo->SetTitle("Sorteo");
        $this->Sorteo->SetLeftMargin(15);
        $this->Sorteo->SetRightMargin(15);

        foreach ($participantes as $value) {
            $posPunto = strpos($value, '.');
            $numero = substr($value, 0, $posPunto);
            $nombre = trim(substr($value, $posPunto + 1));

            $this->Sorteo->SetFont('Arial', 'B', 30);
            $this->Sorteo->Cell(50, 15, $numero, 'LTB', 0, 'C', '0');
            $this->Sorteo->SetFont('Arial', 'B', 10);
            $this->Sorteo->Cell(125, 15, utf8_decode($nombre), 'TRB', 0, 'C', '0');
            $this->Sorteo->Ln(15);
        }

        $this->Sorteo->Output("Sorteo", 'I');
    }

}
