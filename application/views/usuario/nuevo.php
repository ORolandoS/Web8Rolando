<form action="<?= base_url() ?>usuario/guardar" method="POST" enctype="multipart/form-data">
  Nombre(s):
  <input type="text" name="Nombre" id="Nombre" class="form-control">
  Apellido(s):
  <input type="text" name="Apellido" id="Apellido" class="form-control">
  Usuario:
  <input type="text" name="Usuario" id="Usuario" class="form-control">
  Contrasena:
  <input type="text" name="Contrasenia" id="Contrasenia" class="form-control">
  Foto:
  <input type="file" name="Foto" id="Foto" class="form-control">
  <br>
  <input type="submit" value="Guardar" class="btn btn-success">
</form>