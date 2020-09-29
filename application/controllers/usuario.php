<?php
class Usuario extends CI_Controller
{
  public function nuevo()
  {
    $datosC = [
        'titulo' => 'Registro de Nuevo Usuario'
    ];
    $this->load->view("plantilla/cabecerahtml");
    $this->load->view("plantilla/cabecera", $datosC);
    $this->load->view("usuario/nuevo");
    $this->load->view("plantilla/piehtml");
  }
  public function guardar()
    {
      $Nombre = $this->input->post("Nombre");
      $Apellido = $this->input->post("Apellido");
      $Usuario = $this->input->post("Usuario");
      $Contrasenia = $this->input->post("Contrasenia");
      $config['upload_path']          = './imagenes/usuario/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 500;
      $config['max_width']            = 1224;
      $config['max_height']           = 1968;
      $config['overwrite']           = true;
      $this->load->library('upload', $config);
      $datosEnviar = [
        'titulo' => 'Registro de Usuario'
      ];
      $this->load->view("plantilla/cabecerahtml");
      $this->load->view("plantilla/cabecera", $datosEnviar);
      $nombreArchivo = "";
      if ($this->upload->do_upload('Foto'))
      {
        $datosArchivo = $this->upload->data();
        $nombreArchivo = $datosArchivo['file_name'];
        $this->load->model("UsuarioModel");

        if ($this->UsuarioModel->insertar($Nombre, $Apellido, $Usuario, $Contrasenia,$nombreArchivo))
        {
          $this->load->view("usuario/correcto");
        }
        else
        {
          $this->load->view("usuario/error");
        }
      }
      else
      {
        $errores = $this->upload->display_errors();
        $this->load->view("usuario/error");
      }
      $this->load->view("plantilla/piehtml");
    }
    public function listar()
    {
      $this->load->model("UsuarioModel");
      $datosUsuarios = $this->UsuarioModel->seleccionar();
      $data = [
        'datosUsuarios' => $datosUsuarios
      ];

      $dataC = [
          'titulo' => "Listado de Usuarios"
      ];
      $this->load->view("plantilla/cabecerahtml");
      $this->load->view("plantilla/cabecera", $dataC);
      $this->load->view("usuario/listado", $data);
      $this->load->view("plantilla/piehtml");
    }
}