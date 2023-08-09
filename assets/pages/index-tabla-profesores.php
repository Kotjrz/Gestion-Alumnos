<?php

$user = "root";
$pass = "";
$host = "localhost";
$datab = "gestion de alumnos";

  $conexion=mysqli_connect($host,$user,$pass,$datab)
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
          id
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
        $result=mysqli_query($conexion,$sql)

        while($mostrar=mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo $mostrar['id'] ?></td>
            <td><?php echo $mostrar['nombre'] ?></td>
            <td><?php echo $mostrar['apellido'] ?></td>
            <td><?php echo $mostrar['email'] ?></td>
            <td><?php echo $mostrar['telefono'] ?></td>
          </tr>
          <?php 
         } 
          ?>
        
    </table>
  </body>
</html>
