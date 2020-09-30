<?php
class Venta extends CI_Controller
{
  public function nuevo()
  {
    $dataC = [
      'titulo' => "Registro de Nueva Venta"
    ];
    $this->load->view("plantilla/cabecerahtml");
    $this->load->view("plantilla/cabecera", $dataC);

    $this->load->view("venta/nuevo");

    $archivoJSCargar = [
      'archivoJSCargar' => array('js/venta/nuevo.js', 'js/venta/libreria.js')
    ];

    $this->load->view("plantilla/piehtml", $archivoJSCargar);
  }


  public function fila()
  {
    $fila = $this->input->post("fila");
    $this->load->model("ProductoModel");
    $datosProductos = $this->ProductoModel->seleccionar();
    $dataEnviar = [
      'fila' => $fila,
      'datosProductos' => $datosProductos
    ];
    $this->load->view("venta/fila", $dataEnviar);
  }

  public function mostrar()
  {
    $id_producto = $this->input->post('id_producto');

    $this->load->model("ProductoModel");
    $datosProductos = $this->ProductoModel->seleccionar("", 0, $id_producto);
    $datoProductos = $datosProductos[0];

    //Trabajando con STOCK
    $this->load->model("CompraModel");
    $datosCompra = $this->CompraModel->sumarProducto($id_producto);
    $this->load->model("VentadetalleModel");
    $datosVenta = $this->VentadetalleModel->sumarProducto($id_producto);

    $stock = $datosCompra[0]->cantidad - $datosVenta[0]->cantidad;

    $datosMostrar = [
      'stock' => $stock != "" ? $stock : 0,
      'precio' => $datoProductos->precio,
      "imagen" => $datoProductos->foto
    ];

    echo json_encode($datosMostrar);
  }

  public function guardar()
  {
    $p = $this->input->post("p");
    $totalgeneral = $this->input->post("totalgeneral");
    $nombre = $this->input->post("nombre");
    $cancelado = $this->input->post("cancelado");
    $nit = $this->input->post("nit");
    $cambio = $this->input->post("cambio");

    $this->load->model("VentaModel");
    $this->VentaModel->insertar($nombre, $nit, $totalgeneral, $cancelado, $cambio);
    $id_venta = $this->VentaModel->ultimo();

    $this->load->model("VentadetalleModel");

    foreach ($p as $detalle)
    {
      $respuesta = $this->VentadetalleModel->insertar($id_venta, $detalle['id_producto'], $detalle['cantidad'], $detalle['precio'], $detalle['total']);
    }
    $this->load->view('plantilla/cabecerahtml');
    $this->load->view('plantilla/cabecera');
    if ($respuesta)
    {
      $this->load->view('venta/correcto');
    }
    else
    {
      $this->load->view('venta/error');
    }
    $this->load->view('plantilla/piehtml');
  }

  public function listar()
  {
    $this->load->model("VentaModel");
    $datosVenta = $this->VentaModel->seleccionar();
    $desde = $this->uri->segment(3);

    $this->load->library('pagination');

    $config['base_url'] = base_url() . 'venta/listar/';
    $config['total_rows'] = count($datosVenta);
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
    $VentaModel = $this->VentaModel->seleccionar($config['per_page'], $desde);

    $data = [
      'desde' => $desde,
      'datosVentas' => $VentaModel
    ];

    $dataC = [
        'titulo' => "Listado de Ventas"
    ];
    $this->load->view("plantilla/cabecerahtml");
    $this->load->view("plantilla/cabecera", $dataC);
    $this->load->view("venta/listado", $data);
    $this->load->view("plantilla/piehtml");
  }
}