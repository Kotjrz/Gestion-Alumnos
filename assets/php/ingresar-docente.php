
<?php
include '../php/lib/conn.php';

$stmt = $conn->prepare("INSERT INTO profesores (`Nombre`, `Apellido`, `nacionalidad`, `DNI`, `cuil`, `Edad`, `fechaDeNacimiento`, `numeroDeTelefono`, `numeroDeCelular`, `domicilio`, `domicilio_piso`, `domicilio_depto`, `localidad`, `partido`, `Mail`, `mailAbc`, `Titulo`, `legajo`, `files`, `fechaDeIngreso`, `estado`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)");
$stmt->bind_param("sssssssssssssssssssss", $Nombre, $Apellido, $nacionalidad, $DNI, $cuil, $Edad, $Fecha_de_nacimiento, $Numero_de_telefono, $Numero_de_celular, $domicilio, $domicilio_piso, $domicilio_depto, $localidad, $partido, $Mail, $mailAbc, $Titulo, $legajo, $files, $Fecha_de_ingreso, $estado);

$Nombre = $_POST["Nombre"];
$Apellido = $_POST["Apellido"];
$nacionalidad = $_POST["nacionalidad"];
$DNI = $_POST["DNI"];
$cuil = $_POST["cuil"];
$Edad = $_POST["Edad"];
$Fecha_de_nacimiento = $_POST["Fecha_de_nacimiento"];
$Numero_de_telefono = $_POST["Numero_de_telefono"];
$Numero_de_celular = $_POST["Numero_de_celular"];
$domicilio = $_POST["domicilio"];
$domicilio_piso = $_POST["domicilio_piso"];
$domicilio_depto = $_POST["domicilio_depto"];
$localidad = $_POST["localidad"];
$partido = $_POST["partido"];
$Mail = $_POST["Mail"];
$mailAbc = $_POST["mailAbc"];
$Titulo = $_POST["Titulo"];
$legajo = $_POST["legajo"];
$files = $_POST["files"];
$Fecha_de_ingreso = $_POST["Fecha_de_ingreso"];
$estado = $_POST["estado"];

$stmt->execute();


header("Location: ../../index.html");

$stmt->close();
$conn->close();
?>