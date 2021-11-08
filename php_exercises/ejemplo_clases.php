<?php
// clase base con propiedades y métodos miembro
class Verdura {

  var $comestible;
  var $color;

  function __construct($comestible, $color="verde")
  {
      $this->comestible = $comestible;
      $this->color = $color;
  }

  function es_comestible()
  {
      return $this->comestible;
  }

  function qué_color()
  {
      return $this->color;
  }

} // fin de la clase Verdura

// ampliar la clase base
class Espinaca extends Verdura {

  var $cocinada = false;

  function __construct()
  {
      parent::__construct(true, "verde");
  }

  function cocinarla()
  {
      $this->cocinada = true;
  }

  function está_cocinada()
  {
      return $this->cocinada;
  }

} // fin de la clase Espinaca
