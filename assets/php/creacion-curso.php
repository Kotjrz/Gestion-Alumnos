<?php
include '../php/lib/conn.php';      


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Nombre_Curso = $_POST["Nombre_Curso"];
$Anio = $_POST["Anio"];

$stmt = ("INSERT INTO `curso`(`Nombre_Curso`, `Anio`) VALUES ('$Nombre_Curso','$Anio')");
$query = mysqli_query($conn,$stmt);


echo "New records created successfully";   
header("Location: ../../index.html");
?>