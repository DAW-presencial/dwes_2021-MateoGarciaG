<!-- 
Solución Práctica Agenda sin uso de session, archivo externo o base de datos

-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda</title>
</head>

<body>

  <h1>
    Agregar Contacto
  </h1>

  <br>

  <?php

  // Expongo que sea por paso de referencia para así asegurarme de que lo que le llega es el valor de los input
  function chequearNoEsteVacio(&$nombreParam, &$numeroParam, &$agendaContactos)
  {
    if (empty($nombreParam)) {
      echo "<script> alert(\"Debes ingresar un nombre para registrar el contacto \"); </script>";
    }
    // Utilizo la función "array_key_exists() para comprobar que el nombre introducido existe dentro del array"
    elseif (
      empty($numeroParam) &&
      array_key_exists($nombreParam, $agendaContactos)
    ) {
      echo "<b>Has eliminado el contacto: $nombreParam </b>";

      unset($agendaContactos[$nombreParam]);
    } elseif (empty($numeroParam)) {
      echo "<script> alert(\"Este nombre no aparece en tu lista de contactos \"); </script>";
    } else {
      $agendaContactos[$nombreParam] = $numeroParam;
    }
  }

  if (isset($_GET["agendaContactos"])) {
    $agendaContactos = $_GET["agendaContactos"];
  } else {
    $agendaContactos = array();
  }

  if (isset($_GET['submit'])) {

    $nombre_nuevo = filter_input(INPUT_GET, "nombre");
    $numero_nuevo = filter_input(INPUT_GET, "numero");

    chequearNoEsteVacio($nombre_nuevo, $numero_nuevo, $agendaContactos);
  }


  ?>

  <form>

    <label for="">Nombre</label>
    <input type="text" name="nombre" id="">

    <br>

    <label for="">Número de teléfono</label>
    <input type="number" name="numero" id="">

    <br>

    <?php

    foreach ($agendaContactos as $nombre => $telefono) {
      echo "<input type=\"hidden\" name=\"agendaContactos[$nombre]\" value=\"$telefono\" /> ";
    }

    ?>

    <input type="submit" name="submit" value="Agregar Contacto" />

  </form>


  <h2>Agenda de Contactos</h2>

  <ul>
    <?php
    if (count($agendaContactos) != 0) {

      foreach ($agendaContactos as $nombre => $telefono) {
        echo "<li> $nombre -> $telefono </li>";
      }
    } else {
      echo "<h3 style=\"color: blue\"> No tienes contactos en la agenda aún </h3>";
    }



    // $Confirmation = "<script> window.confirm('Your confirmation message here');
    //     </script>";

    // echo $Confirmation;

    // if ($Confirmation == true) {
    //   echo "has pulsado true";
    // } else {
    //   echo "has pulsado cancelar";
    // }

    ?>
  </ul>


</body>

</html>