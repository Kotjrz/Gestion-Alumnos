<?php

include('../php/lib/conn.php');

header("Content-Type: application/json");

$token = $_GET['token'];
$query = "SELECT * FROM sesiones WHERE token = '$token'";
$result = mysqli_query($conn, $query);
$result = $consulta->fetch_assoc();


if(!$result) {
    echo json_encode("No existe la sesión");
    exit;
}

// Verificar si se recibió una solicitud GET con el parámetro DNI
if(isset($_GET['DNI'])) {

    $dni = $_GET['DNI'];
    // Prevenir inyección SQL usando mysqli_real_escape_string o consultas preparadas
    $dni = mysqli_real_escape_string($conn, $dni);

    $consulta = mysqli_query($conn, "SELECT * FROM alumnos WHERE dni = '$dni'");

    $result = $consulta->fetch_all(MYSQLI_ASSOC);

    while ($registro = mysqli_fetch_assoc($consulta)) {
        $result[] = $registro;
    }

    echo json_encode($result);
} else {

    $consulta = mysqli_query($conn, "SELECT * FROM alumnos");

    $result = $consulta->fetch_all(MYSQLI_ASSOC);

    echo json_encode($result);

}
?>

