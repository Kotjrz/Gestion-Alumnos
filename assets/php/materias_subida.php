<?php 
include '../php/lib/conn.php';

$materia = $_POST["materia"];
$horario = $_POST["horario"];
$curso = $_POST["curso"];

$consulta_insert = "INSERT INTO `materia`(`Nombre`, `Horario`, `curso`) VALUES ('$materia','$horario','$curso')";

$realizar_insert = mysqli_query($conn,$consulta_insert);
header("Location: ../pages/indicadores_subida.php");
?>