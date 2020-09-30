<?php
class CompraModel extends CI_Model
{
  function sumarProducto($id_producto)
  {
    $this->db->select('sum(cantidad) as cantidad');
    $this->db->where('activo', 1);
    $this->db->where('id_producto', $id_producto);
    $query = $this->db->get("compra");
    return $query->result();
  }
}
