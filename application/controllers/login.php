<?php
class Login extends CI_Controller
{
  function index()
  {
    $this->load->view('plantilla/login');
  }

  function acceder()
  {
    $usuario = $this->input->post('Usuario');
    $contrasena = $this->input->post('Contrasena');

    $this->load->model('UsuarioModel');
    $datos = $this->UsuarioModel->login($usuario, $contrasena);

    if (count($datos) > 0)
    {
      $dato = $datos[0];
      $newDataSession = [
        'id_usuario' => $dato->id_usuario,
        'nombres' => $dato->nombres,
        'apellidos' => $dato->apellidos,
        'fotografia' => $dato->fotografia,
        'logged_in' => true,
      ];

      $this->session->set_userdata($newDataSession);
      redirect(base_url() . 'inicio/');
    }
    else
    {
      redirect(base_url() . 'login/');
    }
  }

  function salir()
  {
    $DataSession = [
      'id_usuario',
      'nombres',
      'apellidos',
      'fotografia',
      'logged_in',
    ];
    $this->session->unset_userdata($DataSession);
    $this->session->sess_destroy();
    redirect(base_url() . 'login/');
  }
}