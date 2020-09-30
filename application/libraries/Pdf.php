<?php

require_once('fpdf/fpdf.php');

class Pdf extends FPDF
{
  public function __construct($inicial)
  {
    parent::__construct($inicial[0], $inicial[1], $inicial[2]);
  }
  public function Header()
  {
    $this->Image("imagenes/logos/logo.jpg", 5, 5, 20, 20);
    $this->SetFont('Arial', 'B', 16);
    $this->Cell(0, 20, 'Reporte de Ventas', "B", 0, "C");
    $this->ln();

    $this->SetFont('Arial', 'B', 11);
    $this->Cell(10, 5, 'N', "1", 0, "C");
    $this->Cell(50, 5, 'Nombre', "1", 0, "C");
    $this->Cell(50, 5, 'Nit', "1", 0, "C");
    $this->Cell(20, 5, 'Total', "1", 0, "C");
    $this->Cell(20, 5, 'Cancelado', "1", 0, "C");
    $this->Cell(20, 5, 'Cambio', "1", 0, "C");
    $this->ln();
  }

  public function Footer()
  {
    $this->SetY(-15);
    $this->SetFont('Arial', 'B', 10);
    $this->Cell(0, 10, 'Reporte Generado:' . date("Y-m-d H:i:s"), "T", 0, "C");
  }
}
