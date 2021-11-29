<?php
class Verdura {

  public $comestible;
  public $color;

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

}
?>