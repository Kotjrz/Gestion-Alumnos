<?php

include("../php/lib/conn.php");


$id = $_GET["idDocente"];
$sql = $conn->query("SELECT * FROM profesores WHERE idDocente = $id");



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
  <form action="../php/actualizar-docente.php" method="post">
    <table border="0" align="center">
      <h2>Datos personales:</h2>

      <?php
      include("../php/actualizar-docente.php");
      while ($mostrar = $sql->fetch_object()) { ?>
        <input type="text" name="Nombre" placeholder="Nombre" value="<?= $mostrar->Nombre; ?>" /><br />
        <input type="text" name="Apellido" placeholder="Apellido" value="<?= $mostrar->Apellido; ?>" /><br />
        <input type="text" name="nacionalidad" placeholder="Nacionalidad" value="<?= $mostrar->nacionalidad; ?>" /><br />
        <input type="number" name="DNI" placeholder="DNI" value="<?= $mostrar->DNI; ?>" /><br />
        <input type="number" name="cuil" placeholder="CUIL" value="<?= $mostrar->cuil; ?>" /><br />
        <input type="number" name="Edad" placeholder="Edad" value="<?= $mostrar->Edad; ?>" /><br />
        <h4>Fecha de nacimiento:</h4>
        <input type="date" name="Fecha_de_nacimiento" /><br />
        <h2>Contacto:</h2>
        <input type="tel" name="Numero_de_telefono" placeholder="Telefono" value="<?= $mostrar->numeroDeTelefono; ?>" /><br />
        <input type="tel" name="Numero_de_celular" placeholder="Celular(11 ...)" value="<?= $mostrar->numeroDeCelular; ?>" /><br />
        <input type="text" name="domicilio" placeholder="Calle, numero" value="<?= $mostrar->domicilio; ?>" /><br />
        <input type="text" name="domicilio_piso" placeholder="Piso" value="<?= $mostrar->domicilio_piso; ?>" /><br />
        <input type="text" name="domicilio_depto" placeholder="Departamento" value="<?= $mostrar->domicilio_depto; ?>" /><br />
        <input type="text" name="localidad" placeholder="localidad" value="<?= $mostrar->localidad; ?>" /><br />
        <input type="text" name="partido" placeholder="partido" value="<?= $mostrar->partido; ?>" /><br />
        <input type="email" name="Mail" placeholder="Email personal" value="<?= $mostrar->Mail; ?>" /><br />
        <input type="email" name="mailAbc" placeholder="Email (abc)" value="<?= $mostrar->mailAbc; ?>" /><br />
        <h2>Documentos:</h2>
        <input type="text" name="Titulo" placeholder="Titulo" value="<?= $mostrar->Titulo; ?>" /><br />
        <input type="text" name="legajo" placeholder="Legajo" value="<?= $mostrar->legajo; ?>" /><br />
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


      <button type="submit" name="btn-act">Actualizar</button>
    </table>
  </form>
</body>

</html>