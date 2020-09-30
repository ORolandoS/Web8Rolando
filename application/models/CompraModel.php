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

  public function insertar($idproducto, $cantidad)
  {
    $datos = [
      'id_producto' => "$idproducto",
      'cantidad' => "$cantidad",
      'fecha' => date("Y-m-d"),
      'hora' => date("H:i:s"),
      'activo' => 1,
    ];
    return $this->db->insert("compra", $datos);
  }

  public function seleccionar($cantidad = "", $desde = "0")
  {
    $this->db->select('producto.nombre, compra.cantidad');
    $this->db->from('compra');
    $this->db->join('producto', 'compra.id_producto = producto.id_producto');
    $this->db->order_by('producto.nombre');
    if ($cantidad != "")
    {
      $this->db->limit($cantidad, $desde);
    }
    $query = $this->db->get();
    return $query->result();
  }
}
