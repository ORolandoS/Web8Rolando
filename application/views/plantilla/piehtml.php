</div>
<!--Fin de Contenido-->
</div>

</div>
</div>
</div>
</div>

<footer>
  <div class="container">
    <div class="copy text-center">
      Derechos de Autor <a href="#"> - Sistema creado por Rolando Aruquipa</a>
    </div>
  </div>
</footer>
<script>
    const base_url = "<?= base_url(); ?>";
</script>
<script src="<?=base_url();?>js/jquery.js"></script>
<script src="<?=base_url();?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>js/custom.js"></script>
<?php
  if (isset($archivoJSCargar))
  {
      foreach ($archivoJSCargar as $js)
      {
?>
<script src="<?= base_url(); ?><?= $js; ?>"></script>
<?php
      }
  }
?>
</body>

</html>