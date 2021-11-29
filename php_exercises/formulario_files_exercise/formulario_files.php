<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario para subir un archivo</title>
</head>

<body>

  <?php

  // https://www.w3schools.com/php/php_ref_filesystem.asp

  // SUBIR 2 archivos y obtenerlo con $_FILES, 1 cambiarle el tipo y el otro recorrerlo

  // siempre checar si el $_POST o $_GET tienen ya el ["submit"] para saber si el formulario ya fue envíado o no
  // Siempre colocar ete condicional por encima del formulario
  if (isset($_POST["submit"])) {

    foreach ($_FILES as $archivo) {

      print_r("Nombre de archivo:" . $archivo["name"] . "<br>");
      print_r("Tipo de archivo:" . $archivo["type"] . "<br>");
      print_r("Tamaño de archivo:" . $archivo["size"] . "<br>");
      print_r("Tmp_name/ruta de archivo:" . $archivo["tmp_name"] . "<br>");
      print_r("Error de archivo:" . $archivo["error"] . "<br>");
    }


    if ($_FILES["archivo2"]['error'] == 0) {

      // Subir archivo2 a otra dirección
      move_uploaded_file($_FILES["archivo2"]['tmp_name'], './archivo2/' . $_FILES["archivo2"]['name']);

      // mime_content_type('php.gif')
      // Cambiarles el tipo de archivo
      $_FILES["archivo2"]["type"] = "text/plain";

      echo "<br>";
      var_dump($_FILES["archivo2"]);
    }
  }

  ?>

  <h1>SUBIR FORMULARIOS</h1>

  <form method="post" enctype="multipart/form-data">

    <label for="archivo1">Seleccione archivo1: </label>
    <input type="file" name="archivo1" id="archivo1" value="" />

    <br>

    <label for="archivo2">Seleccione archivo2: </label>
    <input type="file" name="archivo2" id="archivo2" value="" />

    <!-- Colocar siempre el name="submit" en el input:submit -->
    <input type="submit" name="submit" value="SUBIR ARCHIVOS">

  </form>


</body>

</html>