<?php
class Login extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library("form_validation");
  }

  function index()
  {
    $this->load->view('plantilla/login');
  }

  function acceder()
  {
    $this->form_validation->set_rules('Usuario', 'USUARIO', 'required|min_length[3]|max_length[10]|alpha', [
            'required' => "El campo %s es requerido",
            'min_length' => "El campo %s debe tener un minimo de %s caracteres",
            'max_length' => "El campo %s debe tener un maximo de %s caracteres",
            'alpha' => "El campo %s solo debe de contener caracteres alfabéticos",

        ]);
    $this->form_validation->set_rules('Contrasena', 'CONTRASENA', 'required|min_length[3]', [
            'required' => "El campo %s es requerido",
            'min_length' => "El campo %s debe tener un minimo de %s caracteres",
            'matches' => "Las dos contraseñas deben de ser iguales",
        ]);
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('plantilla/login');
    }
    else
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