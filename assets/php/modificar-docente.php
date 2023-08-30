<?php

include("../php/conn.php");


$id = $_GET["idDocente"];
$sql = $conn->query("SELECT * FROM profesores WHERE idDocente = $id");
$result = mysqli_fetch_array($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css" />
  <title>Actualizar Datos</title>
</head>

<body>
  <form action="../php/ingresar-docente.php" method="post">
    <table border="0" align="center">
      <h2>Datos personales:</h2>

      <?php
      while ($mostrar = ) { ?>
        <input type="text" name="Nombre" placeholder="Nombre" /><br />
        <input type="text" name="Apellido" placeholder="Apellido" /><br />
        <input type="text" name="nacionalidad" placeholder="Nacionalidad" /><br />
        <input type="number" name="DNI" placeholder="DNI" /><br />
        <input type="number" name="cuil" placeholder="CUIL" /><br />
        <input type="number" name="Edad" placeholder="Edad" /><br />
        <h4>Fecha de nacimiento:</h4>
        <input type="date" name="Fecha_de_nacimiento" /><br />
        <h2>Contacto:</h2>
        <input type="tel" name="Numero_de_telefono" placeholder="Telefono" /><br />
        <input type="tel" name="Numero_de_celular" placeholder="Celular(11 ...)" /><br />
        <input type="text" name="domicilio" placeholder="Calle, numero" /><br />
        <input type="text" name="domicilio_piso" placeholder="Piso" /><br />
        <input type="text" name="domicilio_depto" placeholder="Departamento" /><br />
        <input type="text" name="localidad" placeholder="localidad" /><br />
        <input type="text" name="partido" placeholder="partido" /><br />
        <input type="email" name="Mail" placeholder="Email personal" /><br />
        <input type="email" name="mailAbc" placeholder="Email (abc)" /><br />
        <h2>Documentos:</h2>
        <input type="text" name="Titulo" placeholder="Titulo" /><br />
        <input type="text" name="legajo" placeholder="Legajo" /><br />
        <h4>Titulos/DNI/Antecedentes penales/etc:</h4>
        <input type="file" name="files" placeholder="Documentos profesores" /><br />
        <h4>Fecha de ingreso:</h4>
        <input type="date" name="Fecha_de_ingreso" /><br />
        <h4>Actividad:</h4>
        <select name="estado" id="estado">
          <option value="Si">Activo</option>
          <option value="No">No activo</option>
        </select><br>

      <?php } ?>


      <button value="submit">Enviar</button>
    </table>
  </form>
</body>

</html>