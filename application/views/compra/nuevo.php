<form action="<?= base_url() ?>compra/guardar" method="POST" enctype="multipart/form-data">
  Producto:
  <select name="Producto" class="form-control id_producto ">
      <option value="0">Seleccionar</option>
      <?php
        foreach ($datosProductos as $p)
        {
      ?>
      <option value="<?= $p->id_producto ?>"><?= $p->nombre ?></option>
      <?php
        }
      ?>
    </select>
  Cantidad:
  <input type="number" min="0" step="0.01" name="Cantidad" id="Precio" class="form-control">
  <br>
  <input type="submit" value="Guardar" class="btn btn-success">
</form>