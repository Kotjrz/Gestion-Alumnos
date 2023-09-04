<?php

include("../php/lib/conn.php");

if(isset($_GET['idDocente'])){
 $id = $_GET['idDocente'];
 $query = "SELECT * from `profesores` WHERE `idDocente` = $id ";
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
        if(isset($_POST["actualizarProfesores"]))
        {
          $nombre = $_POST["Nombre"];
          $apellidos = $_POST["Apellido"];
          $nacionalidad = $_POST["nacionalidad"];
          $DNI = $_POST["DNI"];
          $CUIL = $_POST["cuil"];
          $fechanacimiento = $_POST["Fecha_de_nacimiento"];
          $Edad = $_POST["Edad"];
          $telefono = $_POST["Numero_de_telefono"];
          $celular = $_POST["Numero_de_celular"];
          $domicilio = $_POST["domicilio"];
          $depto = $_POST["domicilio_depto"];
          $piso = $_POST["domicilio_piso"];
          $localidad = $_POST["localidad"];
          $partido = $_POST["partido"];
          $mail = $_POST["Mail"];
          $mailabc = $_POST["mailAbc"];
          $titulo = $_POST["Titulo"];
          $legajo = $_POST["legajo"];
          $fechaingreso = $_POST["Fecha_de_ingreso"];
          $estado = $_POST["estado"];

          $query = "UPDATE `profesores` set `Nombre` ='$nombre' , `Apellido` = '$apellidos', `nacionalidad` = '$nacionalidad', `DNI` = '$DNI', `cuil` = '$CUIL', `Edad` = '$Edad', `fechaDeNacimiento` = '$fechanacimiento', `numeroDeTelefono` = '$telefono', `numeroDeCelular` = '$celular', `domicilio` = '$domicilio', `domicilio_piso` = '$piso', `domicilio_depto` = '$depto', `localidad` = '$localidad', `partido` = '$partido', `Mail` = '$mail', `mailAbc` = '$mailabc', `Titulo` = '$titulo', `legajo` = '$legajo', `Fechadeingreso` = '$fechaingreso' , `estado` = '$estado' WHERE `idDocente` = '$id' ";

          $result = mysqli_query($conn, $query);

          if(!$result)
          {
            die("Consulta fallida".mysqli_error($conn));
          }

          else{
            header('location:../pages/tabla-profesores.php?update_msg=Docente Modificado. ');
          }

        }
      ?>
<body>
  <form method="post" action="modificar-docente.php?idDocente=<?php echo $id; ?>">
    <table border="0" align="center">
      <h2>Datos personales:</h2>



      
        <input type="text" name="Nombre" placeholder="Nombre" value="<?php echo $row['Nombre']; ?>" /><br />
        <input type="text" name="Apellido" placeholder="Apellido" value="<?php echo $row['Apellido']; ?>" /><br />
        <input type="text" name="nacionalidad" placeholder="Nacionalidad" value="<?php echo $row['nacionalidad']; ?>" /><br />
        <input type="number" name="DNI" placeholder="DNI" value="<?php echo $row['DNI']; ?>" /><br />
        <input type="number" name="cuil" placeholder="CUIL" value="<?php echo $row['cuil']; ?>" /><br />
        <input type="number" name="Edad" placeholder="Edad" value="<?php echo $row['Edad']; ?>" /><br />
        <h4>Fecha de nacimiento:</h4>
        <input type="date" name="Fecha_de_nacimiento" value="<?php echo $row['fechaDeNacimiento']; ?>">/><br />
        <h2>Contacto:</h2>
        <input type="tel" name="Numero_de_telefono" placeholder="Telefono" value="<?php echo $row['numeroDeTelefono']; ?>" /><br />
        <input type="tel" name="Numero_de_celular" placeholder="Celular(11 ...)" value="<?php echo $row['numeroDeCelular']; ?>" /><br />
        <input type="text" name="domicilio" placeholder="Calle, numero" value="<?php echo $row['domicilio']; ?>" /><br />
        <input type="text" name="domicilio_piso" placeholder="Piso" value="<?php echo $row['domicilio_piso']; ?>" /><br />
        <input type="text" name="domicilio_depto" placeholder="Departamento" value="<?php echo $row['domicilio_depto']; ?>" /><br />
        <input type="text" name="localidad" placeholder="localidad" value="<?php echo $row['localidad']; ?>" /><br />
        <input type="text" name="partido" placeholder="partido" value="<?php echo $row['partido']; ?>" /><br />
        <input type="email" name="Mail" placeholder="Email personal" value="<?php echo $row['Mail']; ?>" /><br />
        <input type="email" name="mailAbc" placeholder="Email (abc)" value="<?php echo $row['mailAbc']; ?>" /><br />
        <h2>Documentos:</h2>
        <input type="text" name="Titulo" placeholder="Titulo" value="<?php echo $row['Titulo']; ?>" /><br />
        <input type="text" name="legajo" placeholder="Legajo" value="<?php echo $row['legajo']; ?>" /><br />
        <h4>Titulos/DNI/Antecedentes penales/etc:</h4>
        <input type="file" name="files" placeholder="Documentos profesores" value="<?php echo $row['files']; ?>" /><br />
        <h4>Fecha de ingreso:</h4>
        <input type="date" name="Fecha_de_ingreso" value="<?php echo $row['fechaDeIngreso'];?>" /><br />
        <h4>Actividad:</h4>
        <select name="estado" id="estado">
          <option value="Si">Activo</option>
          <option value="No">No activo</option>
        </select><br>

      <button type="submit" name="actualizarProfesores" value="ok">Actualizar</button>
    </table>
  </form>
  <a href="../pages/tabla-profesores.php">Volver</a>
</body>

</html>