<?php
function mayuscula($texto)
{
  return mb_strtoupper($texto, "utf8");
}

function minuscula($texto)
{
  return mb_strtolower($texto, "utf8");
}
