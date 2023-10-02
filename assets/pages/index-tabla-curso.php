<?php

use function PHPSTORM_META\sql_injection_subst;

include '../php/lib/conn.php';

$sql = "SELECT * FROM curso";

include("../php/eliminar-curso.php")
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />


  <link rel="stylesheet" href="../css/style.css" />


  <title>Tabla de Cursos</title>
</head>

<body>
  <table border="1">
    <tr>

      <td>
        Nombre del curso
      </td>


      <td>
        Año
      </td>


    </tr>


    <?php
    $sql = "SELECT * from curso";
    $result = mysqli_query($conn, $sql);


    while ($mostrar = mysqli_fetch_array($result)) {
    ?>
      <tr>
        <td><?php echo $mostrar['Nombre_Curso'] ?></td>
        <td><?php echo $mostrar['Anio'] ?></td>
        <td><a href="../pages/modificar-curso.php?ID_curso=<?php echo $mostrar["ID_curso"]; ?>" class="button-medium-update">Actulizar</a></td>
        <td><a href="index-tabla-curso.php?ID_curso=<?php echo $mostrar["ID_curso"]; ?>" class="button-medium-delete">Eliminar (no usar)</a></td>
      </tr>
    <?php
    }
    ?>

  </table>
  <a href="../../index.html">Volver</a>
</body>

</html>