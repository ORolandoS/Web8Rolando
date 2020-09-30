<?php

class Inicio extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->has_userdata('logged_in'))
    {
      redirect(base_url() . 'login/');
    }
  }
  public function index()
  {
    $this->load->view("plantilla/cabecerahtml");
    $this->load->view("plantilla/cabecera");
    $this->load->view("plantilla/piehtml");
  }
}