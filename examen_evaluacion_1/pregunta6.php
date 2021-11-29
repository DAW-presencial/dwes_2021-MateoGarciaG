<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario para subir DOS archivo</title>
</head>

<body>

  <?php
  if (isset($_POST["submit"])) {

    foreach ($_FILES as $archivo) {

      print_r("Nombre de archivo:" . $archivo["name"] . "<br>");
      print_r("Tipo de archivo:" . $archivo["type"] . "<br>");
      print_r("Tamaño de archivo:" . $archivo["size"] . "<br>");
      print_r("Tmp_name/ruta de archivo:" . $archivo["tmp_name"] . "<br>");
      print_r("Error de archivo:" . $archivo["error"] . "<br>");
      $_FILES["archivo2"]["type"] = "text/plain";

      if ($archivo['error'] == 0) {
        move_uploaded_file($_FILES["archivo2"]['tmp_name'], './subidos/' . $archivo['name']);
    }


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

    <input type="submit" name="submit" value="SUBIR ARCHIVOS">

  </form>


</body>

</html>