<?php

include('conexion.php');

header("Content-Type: application/json");

// Verificar si se recibió una solicitud GET con el parámetro DNI
if(isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    // Prevenir inyección SQL usando mysqli_real_escape_string o consultas preparadas
    $ID = mysqli_real_escape_string($conexion, $ID);

    $consulta = mysqli_query($conexion, "SELECT * FROM materia WHERE ID = '$dni'");

    $result = [];

    while ($registro = mysqli_fetch_assoc($consulta)) {
        $result[] = $registro;
    }

    echo json_encode($result);
} else {

    $consulta = mysqli_query($conexion, "SELECT * FROM materia");

    $result = $consulta->fetch_all();

    echo json_encode($result);

}
?>

