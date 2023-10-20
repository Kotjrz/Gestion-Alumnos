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
if(isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    // Prevenir inyección SQL usando mysqli_real_escape_string o consultas preparadas
    $ID = mysqli_real_escape_string($conn, $ID);

    $consulta = mysqli_query($conn, "SELECT * FROM materia WHERE ID = '$dni'");

    $result = [];

    while ($registro = mysqli_fetch_assoc($consulta)) {
        $result[] = $registro;
    }

    echo json_encode($result);
} else {

    $consulta = mysqli_query($conn, "SELECT * FROM materia");

    $result = $consulta->fetch_all();

    echo json_encode($result);

}
?>

