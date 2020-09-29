<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>N</th>
      <th>Nombre(s)</th>
      <th>Apellido(s)</th>
      <th>Fotografia</th>
      <th>Usuario</th>
      <th>Contrasena</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i = $desde;
      foreach ($datosUsuarios as $dp)
      {
        $i++;
    ?>
    <tr>
      <td><?= $i; ?></td>
      <td><?= $dp->nombres ?></td>
      <td><?= $dp->apellidos ?></td>
      <td><img src="<?= base_url() ?>imagenes/usuario/<?= $dp->fotografia ?>" width="50"></td>
      <td><?= $dp->usuario ?></td>
      <td><?= $dp->contrasena ?></td>
      <td>
        <a href="<?= base_url() ?>usuario/modificar" class="btn btn-xs btn-warning">Modificar</a>
        <a href="<?= base_url() ?>usuario/eliminar" class="btn btn-xs btn-danger">Eliminar</a>
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