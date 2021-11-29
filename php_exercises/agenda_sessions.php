<!-- 
Solución Práctica Agenda sin uso de session, archivo externo o base de datos

-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda con Sessiones</title>
</head>

<body>

  <h1>
    Agregar Contacto
  </h1>

  <br>

  <?php

  session_start(['cookie_lifetime' =>3600]);

  // isset — Determina si una variable está definida y no es null
  // En este caso para comprobar si ya $_SESSION["agendaContactos"] está definida o no
  if (!isset($_SESSION["agendaContactos"])) {
    $_SESSION['agendaContactos'] = array();
  }

  if (isset($_GET['submit'])) {

    $nombre_nuevo = filter_input(INPUT_GET, "nombre");
    $telefono_nuevo = filter_input(INPUT_GET, "numero");

    if (empty($nombre_nuevo)) {
      echo "<script> alert(\"Debes ingresar un nombre para registrar el contacto \"); </script>";
    }
    elseif (
      empty($telefono_nuevo) &&
      array_key_exists($nombre_nuevo, $_SESSION['agendaContactos'])
    ) {
      echo "<b>Has eliminado el contacto: $nombre_nuevo </b>";

      unset($_SESSION['agendaContactos'][$nombre_nuevo]);
    } elseif (empty($telefono_nuevo)) {
      echo "<script> alert(\"Este nombre no aparece en tu lista de contactos \"); </script>";
    } else {
      $_SESSION['agendaContactos'][$nombre_nuevo] = $telefono_nuevo;
    }

  }


  ?>

  <form>

    <label for="">Nombre</label>
    <input type="text" name="nombre" id="">

    <br>

    <label for="">Número de teléfono</label>
    <input type="number" name="numero" id="">

    <br>

    <input type="submit" name="submit" value="Agregar Contacto" />

  </form>


  <h2>Agenda de Contactos</h2>

  <ul>
    <?php
    if (count($_SESSION['agendaContactos']) > 0) {

      foreach ($_SESSION['agendaContactos'] as $nombre => $telefono) {
        echo "<li> $nombre -> $telefono </li>";
      }
    } else {
      echo "<h3 style=\"color: blue\"> No tienes contactos en la agenda aún </h3>";
    }


    ?>
  </ul>


</body>

</html>