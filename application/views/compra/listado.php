<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>N</th>
      <th>Producto</th>
      <th>Cantidad</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i = $desde;
      foreach ($datosCompra as $dp)
      {
        $i++;
    ?>
    <tr>
      <td><?= $i; ?></td>
      <td><?= $dp->nombre ?></td>
      <td><?= $dp->cantidad ?></td>
      <!-- <td><img src="<?= base_url() ?>imagenes/productos/<?= $dp->foto ?>" width="50"></td>
      <td><?= $dp->detalle ?></td> -->
      <td>
        <a href="<?= base_url() ?>compra/modificar" class="btn btn-xs btn-warning">Modificar</a>
        <a href="<?= base_url() ?>compra/eliminar" class="btn btn-xs btn-danger">Eliminar</a>
      </td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
<?php
  echo $this->pagination->create_links();
?>