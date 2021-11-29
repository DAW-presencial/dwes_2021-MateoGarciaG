
<?php

/* 
Justificación: 
  1.Se activan las funciones del padre?: Tanto en la clase padre como en la hija, se activan el __get() y __set(), lo que sucede es que en el hijo se llama dos vecess
  2. Como afecta a la subclase que una propiedad sea privada o protegida en la clase padre?: La subclase puede llamar a una propiedad PROTECTED y PRIVATE mediante __get() y __set() 
*/



// Subclase
class Animal {

  protected $nombre;
  private $color;
  protected $edad;

  function __construct($nombre, $color, $edad)
  {
      $this->nombre = $nombre;
      $this->color = $color;
      $this->edad = $edad;

  }

  function comer()
  {
      echo "El animal está comiendo";
  }

  function dormir()
  {
      echo "El animal está durmiendo";
  }

  function get_color() {
    return $this->color;
  }

  function get_edad() {
    return $this->edad;
  }

  function get_nombre() {
    return $this->nombre;
  }

  public function __get($nombre_prop) {
    echo "Estás llamando al método __get()";
    echo "<br>";
    if(property_exists($this, $nombre_prop)) {
      return $this->nombre_prop;
    } else {
      echo "está propiedad no existe";
    }
  }

  public function __set($propiedad, $valor) {
    echo "Estás llamando al método __set()";
    echo "<br>";
    if(property_exists($this, $propiedad)) {
      echo "Si existe la propiedad: " . $propiedad;
      $this->$propiedad = $valor;
    } else {
      echo "está propiedad no existe";
    }
  }


}

class Perro extends Animal {

  private $vacunado;

  function __construct($nombre, $color, $edad, $vacunado)
  {
    parent::__construct($nombre, $color, $edad);
      $this->vacunado = $vacunado;

  }

  function is_vacunado() {
    return $this->vacunado;
  }

}

echo "<br> <br>" . "Objeto Clase Padre" . "<br>";

// Objeto Clase padre
$cocodrilo = new Animal("cocodrilo", "verde", 5);


echo "<br>" . "nombre:" . $cocodrilo->nombre;
echo "<br>" . "color:" . $cocodrilo->color;

/* Resultado
----------------------

Estás llamando al método __get()
Estás llamando al método __get()
está propiedad no existe


-------------------------

*/


echo "<br>";
// __set()
$cocodrilo->nombre = "Bufalo";
$cocodrilo-> color = "amarillo";
/* Resultado
----------------------

Estás llamando al método __set()
Si existe la propiedad: nombreEstás llamando al método __set()
Si existe la propiedad: color


-------------------------


*/


// ¿Se activan las funciones del padre? SI, porque al momento de leer o modificar las propiedades desde la subclase, vemos que se llama al __get() y set():
// ---------------------------------------------
echo "<br> <br>" . "Objeto Subclase" . "<br>";
$pastor_aleman = new Perro("pastor Alemán", "café", 10, true);

echo "<br>";


// Comprobamos si $pastor_aleman puede usar __get() o __set() mediante la propieda $nombre que es PROTECTED
// __get()
echo $pastor_aleman->nombre;

/* Resultado
----------------------

Estás llamando al método __get()
Estás llamando al método __get()
está propiedad no existe


-------------------------

Por lo que vemos desde una subclase se llama al __get() tanto de la clase padre como del hijo. Pero en este caso aplica para las propiedades PROTECTED

*/


echo "<br>";
// __set()
$pastor_aleman->nombre = "Chihuahua";
/* Resultado
----------------------

Estás llamando al método __set()
Si existe la propiedad: nombre


-------------------------

Por lo que vemos desde una subclase se llama al __set() tanto de la clase padre como del hijo. Pero en este caso aplica para las propiedades PROTECTED

*/





?>