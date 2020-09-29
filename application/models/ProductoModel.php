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
  public function seleccionar()
  {
    $this->db->select('id_producto,nombre,precio,detalle,foto');
    $this->db->where('activo', 1);
    $this->db->order_by('nombre');
    $query = $this->db->get('producto');
    return $query->result();
  }
}