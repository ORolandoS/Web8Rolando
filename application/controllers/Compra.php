<?php
class Compra extends CI_Controller
{
  // public function __construct()
  // {
  //   parent::__construct();
  //   if (!$this->session->has_userdata('logged_in'))
  //   {
  //     redirect(base_url() . 'login/');
  //   }
  // }

  public function nuevo()
  {
    $this->load->model("ProductoModel");
    $datosProductos = $this->ProductoModel->seleccionar();
    $datosP=[
      'datosProductos'=>$datosProductos
    ];
    $datosC = [
        'titulo' => 'Registro de Nuevo Compra'
    ];
    $this->load->view("plantilla/cabecerahtml");
    $this->load->view("plantilla/cabecera", $datosC);
    $this->load->view("compra/nuevo",$datosP);
    $this->load->view("plantilla/piehtml");
  }
  public function guardar()
  {
    // $p = $this->input->post("p");
    $IdProducto = $this->input->post("Producto");
    $Cantidad = $this->input->post("Cantidad");
    $datosC = [
        'titulo' => 'Registro de Nuevo Compra'
    ];
    $this->load->view("plantilla/cabecerahtml");
    $this->load->view("plantilla/cabecera", $datosC);
    if($IdProducto!=0)
    {
      $this->load->model("CompraModel");
      if ($this->CompraModel->insertar($IdProducto, $Cantidad))
      {
        $this->load->view("compra/correcto");
      }
      else
      {
        $this->load->view("compra/error");
      }
    }
    else
    {
      $this->load->view("compra/error");
    }
    $this->load->view("plantilla/piehtml");
  }
  public function listar()
  {
    $this->load->model("CompraModel");
    $datosCompra = $this->CompraModel->seleccionar();
    $desde = $this->uri->segment(3);

    $this->load->library('pagination');

    $config['base_url'] = base_url() . 'compra/listar/';
    $config['total_rows'] = count($datosCompra);
    $config['per_page'] = 2;
    $config['num_links'] = 3;
    $config['uri_segment'] = 3;

    //Estilos de la paginación
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';

    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';

    $config['first_link'] = 'Primero';

    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';

    $config['last_link'] = 'Último';

    $this->pagination->initialize($config);
    $compraModel = $this->CompraModel->seleccionar($config['per_page'], $desde);

    $data = [
      'desde' => $desde,
      'datosCompra' => $compraModel
    ];

    $dataC = [
        'titulo' => "Listado de Compra"
    ];
    $this->load->view("plantilla/cabecerahtml");
    $this->load->view("plantilla/cabecera", $dataC);
    $this->load->view("compra/listado", $data);
    $this->load->view("plantilla/piehtml");
  }
}