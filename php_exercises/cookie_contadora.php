<?php

if(!isset($_COOKIE["contador"])) {
  $contador = 1;
  setcookie("contador", $contador);
} else {
  setcookie("contador", ++$_COOKIE["contador"]);

  $valorCookie = $_COOKIE["contador"];
  echo "<h1> $valorCookie </h1>";
}




?>