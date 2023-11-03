<?php

include('../php/lib/conn.php');

include('../php/lib/checklogin.php');

header("Content-Type: application/json");

$sesion = checkToken($_GET["token"]);


if(!$sesion) {
    echo json_encode("No existe la sesión");
    exit;
}

if($sesion["rol"] == "Alumno") {
    $alumno = getInfo($sesion);
    $alumnoID = $alumno["idAlumno"];
    $query = "SELECT * FROM `materia` WHERE curso IN 
              (SELECT Curso_CA from curso_alumnos where alumnos_CA = 1); ";
    $result = $conn->query($query);
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
}else {


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
}
?>

