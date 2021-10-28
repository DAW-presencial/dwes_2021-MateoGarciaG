

<?php 



function ordenarArrayBurbuja(array $array_param) : array {

  // Bucle para recorrer todos los elementos del array por cada elemento
  for ($i=0; $i < count($array_param); $i++) { 
    
    // Por cada iteración del primer bucle haré un segundo bucle para recorrer todos los elementos menos el último para que no lance "IndexOutOfRange"
    for ($j=0; $j < count($array_param) - 1; $j++) {
      // Comparo si el actual elemento es menor al siguiente, si lo es intercambia valores
        if($array_param[$j] > $array_param[$j+1]) {
          $intercambioValor = $array_param[$j];
          $array_param[$j] = $array_param[$j+1];
          $array_param[$j+1] = $intercambioValor;
        }
    }
  }


  return $array_param;

}

$array_desordenado = array(2,3,4,4,8,7,10,5,6,9,1);

$array_ordenado = ordenarArrayBurbuja($array_desordenado);

echo "Array desordenado -> ";
print_r($array_desordenado);

echo "<br>";

echo "Array ordenado -> ";
print_r($array_ordenado);


?>