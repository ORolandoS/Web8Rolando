<?php
function decimal($numero, $decimales = 2)
{
  return number_format($numero, $decimales);
}