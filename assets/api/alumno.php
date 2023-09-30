<?php

include('../php/lib/conn.php');

header("Content-Type: application/json");

// Verificar si se recibió una solicitud GET con el parámetro DNI
if(isset($_GET['DNI'])) {
    $dni = $_GET['DNI'];
    // Prevenir inyección SQL usando mysqli_real_escape_string o consultas preparadas
    $dni = mysqli_real_escape_string($conexion, $dni);

    $consulta = mysqli_query($conn, "SELECT * FROM alumnos WHERE dni = '$dni'");

    $result = [];

    while ($registro = mysqli_fetch_assoc($consulta)) {
        $result[] = $registro;
    }

    echo json_encode($result);
} else {

    $consulta = mysqli_query($conn, "SELECT * FROM alumnos");

    $result = $consulta->fetch_all();

    echo json_encode($result);

}
?>

