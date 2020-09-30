<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>N</th>
      <th>Nombre</th>
      <th>Nit</th>
      <th>Total</th>
      <th>Cancelado</th>
      <th>Cambio</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i = $desde;
      foreach ($datosVentas as $dp)
      {
        $i++;
    ?>
    <tr>
      <td><?= $i; ?></td>
      <td><?= $dp->nombre ?></td>
      <td><?= $dp->nit ?></td>
      <td><?= $dp->total ?></td>
      <td><?= $dp->cancelado ?></td>
      <td><?= $dp->cambio ?></td>
      <td>
        <a href="<?= base_url() ?>venta/modificar" class="btn btn-xs btn-warning">Modificar</a>
        <a href="<?= base_url() ?>venta/eliminar" class="btn btn-xs btn-danger">Eliminar</a>
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