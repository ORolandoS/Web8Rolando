<?php
class UsuarioModel extends CI_Model
{
  public function insertar($nombre, $apellido, $usuario, $contrasena,$foto)
  {
    $datos = [
      'nombres' => "$nombre",
      'apellidos' => "$apellido",
      'fotografia' => "$foto",
      'usuario' => "$usuario",
      'contrasena' => "$contrasena",
      'nivel'=>1,
      'fecha' => date("Y-m-d"),
      'hora' => date("H:i:s"),
      'activo' => 1,
    ];
    return $this->db->insert("usuario", $datos);
  }
  public function seleccionar()
  {
    $this->db->select('id_usuario,nombres,apellidos,fotografia,usuario,contrasena');
    $this->db->where('activo', 1);
    $this->db->order_by('nombres');
    $query = $this->db->get('usuario');
    return $query->result();
  }
}