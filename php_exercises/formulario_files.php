
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario para subir un archivo</title>
</head>
<body>

  <form action="" method="post" enctype="multipart/form-data">

  <label for=”archivoSeleccionado”>Seleccione archivo: </label>
  <input type=”file” name=”archivoSeleccionado” id=”archivoSeleccionado” value=”” />

  <?php
    // SUBIR 2 archivos y obtenerlo con $_FILES, 1 cambiarle el tipo y el otro recorrerlo
  ?>


  </form>
  
</body>
</html>