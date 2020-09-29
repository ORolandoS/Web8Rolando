<?php
class ProductoModel extends CI_Model
{
  public function insertar($nombre, $precio, $detalle, $foto)
  {

    $datos = [
      'nombre' => "$nombre",
      'precio' => "$precio",
      'detalle' => "$detalle",
      'foto' => "$foto",
      'fecha' => date("Y-m-d"),
      'hora' => date("H:i:s"),
      'activo' => 1,
    ];


    return $this->db->insert("producto", $datos);
  }
}