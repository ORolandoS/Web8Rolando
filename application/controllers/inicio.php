<?php

class Inicio extends CI_Controller
{
  public function index()
  {
    $this->load->view("plantilla/cabecerahtml");
    $this->load->view("plantilla/cabecera");
    $this->load->view("plantilla/piehtml");
  }
}