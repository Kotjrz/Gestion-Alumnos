<?php

include '../php/lib/conn.php';

if(isset($_GET['ID_curso'])){
 $id = $_GET['ID_curso'];
 $query = "SELECT * from `curso` WHERE `ID_curso` = $id ";
 $result = mysqli_query($conn, $query);
if(!$result){
  die("query fallida". mysqli_error($conn));
}else{
  $row = mysqli_fetch_assoc($result);
}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css" />
  <title>Actualizar Datos</title>
</head>

      <?php 
        if(isset($_POST["actualizarCurso"]))
        {
          $nombre = $_POST["Nombre_Curso"];
          $anio = $_POST["Anio"];
        

          $query = "UPDATE `curso` set `Nombre_Curso` ='$nombre' , `Anio` = '$anio' WHERE `ID_curso` = '$id' ";
          $result = mysqli_query($conn, $query);

          if(!$result)
          {
            die("Consulta fallida".mysqli_error($conn));
          }

          else{
            header('location:../pages/index-tabla-curso.php?update_msg=Curso Modificado. ');
          }

        }
      ?>
<body>
  <form method="post" action="modificar-curso.php?ID_curso=<?php echo $id; ?>">
    <table border="0" align="center">
      <h2>Datos personales:</h2>



      
        <input type="text" name="Nombre_Curso" placeholder="Nombre del curso" value="<?php echo $row['Nombre_Curso']; ?>" /><br />
        <input type="text" name="Anio" placeholder="Año" value="<?php echo $row['Anio']; ?>" /><br />
        

      <button type="submit" name="actualizarCurso" value="ok">Actualizar</button>
    </table>
  </form>
  <a href="../pages/index-tabla-curso.php">Volver</a>
</body>

</html>