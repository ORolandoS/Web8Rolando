<!DOCTYPE html>
<html>

<head>
  <title>Acceso al Sistema</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="<?= base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- styles -->
  <link href="<?= base_url(); ?>css/styles.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-bg">
  <div class="header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Logo -->
          <div class="logo">
            <h1><a href="index.html">Sistema de Ventas</a></h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-content container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-wrapper">
          <div class="box">
            <div class="content-wrap">
              <h6>Acceso al Sistema</h6>
              <?php echo validation_errors(); ?>
              <form action="<?= base_url() ?>login/acceder" method="POST">
                <input class="form-control" type="text" placeholder="Usuario" name="Usuario">
                <input class="form-control" type="password" placeholder="Contrasena" name="Contrasena">
                <input class="form-control" type="password" placeholder="Repita la Contrasena" name="ContrasenaDOS">
                <input type="submit" class="btn btn-primary signup" value="Ingresar">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://code.jquery.com/jquery.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?= base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>js/custom.js"></script>
</body>

</html>