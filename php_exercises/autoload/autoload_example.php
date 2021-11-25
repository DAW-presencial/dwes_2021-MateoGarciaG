<?php

// OBSOLETA
// function __autoload($clase) {
//     include 'clases/' . $clase . '.clase.php';
// }

//Registramos mi_autoloader() como callback que se ejecutará
//al intentar inicializar una clase que no existe
function mi_autocargador($clase) {
	include 'classes/' . $clase . '.php';
}

//implementamos mi_autoloader(), que recibe el nombre de la clase
//que se ha intentado inicializar
spl_autoload_register('mi_autocargador');

// O, usando una función anónima a partir de PHP 5.3.0
spl_autoload_register(function ($clase) {
	include 'clases/' . $clase . '.clase.php';
});

// Instanciamos los objetos
$employee1 = new Employee("Pedro", "Harrison", 19);
$employee2 = new Verdura(true, "rojo");

echo $employee1;
echo $employee2;



?>