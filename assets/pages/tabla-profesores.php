<?php

use function PHPSTORM_META\sql_injection_subst;

include("../php/lib/conn.php");
include("../php/eliminar-docente.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <title>Tabla de profesores</title>
</head>
<body>
  <table border="1">
    <tr>
      <td>
        DNI
      </td>
      <td>
        Nombre
      </td>
      <td>
        Apellido
      </td>
      <td>
        Email
      </td>
      <td>
        Telefono
      </td>
    </tr>

    <?php
    $sql = "SELECT * from profesores";
    $result = mysqli_query($conn, $sql);

    while ($mostrar = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $mostrar['DNI'] ?></td>
        <td><?php echo $mostrar['Nombres'] ?></td>
        <td><?php echo $mostrar['Apellidos'] ?></td>
        <td><?php echo $mostrar['Mail'] ?></td>
        <td><?php echo $mostrar['numeroDeTelefono'] ?></td>
        <td><a href="../php/modificar-docente.php?idDocente=<?php echo $mostrar["idDocente"]; ?>" class="button-medium-update">Actulizar</a></td>
        <td><a href="tabla-profesores.php?idDocente=<?php echo $mostrar["idDocente"]; ?>" class="button-medium-delete">Eliminar</a></td>
      </tr>
    <?php
    }
    ?>


  </table>
  <a href="../../index.html">Volver</a>
</body>

</html>