<?php

use function PHPSTORM_META\sql_injection_subst;

$user = "root";
$pass = "";
$host = "localhost";
$datab = "gestion de alumnos";

  $conexion=mysqli_connect($host,$user,$pass,$datab)
  or die("Problemas al conectar");
  $sql = "SELECT * FROM profesores";
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
        $sql="SELECT * from profesores";
        $result=mysqli_query($conexion,$sql);

        while($mostrar=mysqli_fetch_array($result)){
         ?>
          <tr>
            <td><?php echo $mostrar['DNI'] ?></td>
            <td><?php echo $mostrar['Nombre'] ?></td>
            <td><?php echo $mostrar['Apellido'] ?></td>
            <td><?php echo $mostrar['Mail'] ?></td>
            <td><?php echo $mostrar['Numero de telefono'] ?></td>
          </tr>
          <?php 
         } 
          ?>
        
    </table>
    <a href="../../index.html">Volver</a>
  </body>
</html>