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
    $query = "SELECT * FROM `curso` WHERE ID_curso IN 
              (SELECT Curso_CA from curso_alumnos where alumnos_CA = $alumnoID);";
    $result = $conn->query($query);
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
}else {
    // Verificar si se recibió una solicitud GET con el parámetro DNI
    if(isset($_GET['alumnoID'])) {
        $alumno = $_GET['alumnoID'];
        // Prevenir inyección SQL usando mysqli_real_escape_string o consultas preparadas
        $alumno = mysqli_real_escape_string($conn, $alumno);

        $consulta = mysqli_query($conn, "SELECT * FROM curso WHERE ID_curso in (SELECT Curso_CA FROM curso_alumnos WHERE Alumnos_CA = $alumno); ");

        $result = $consulta->fetch_all();

        echo json_encode($result);
    } else if(isset($_GET['alumnoDNI'])) {
        $dni = $_GET['alumnoDNI'];
        // Prevenir inyección SQL usando mysqli_real_escape_string o consultas preparadas
        $dni = mysqli_real_escape_string($conn, $dni);

        $consulta = mysqli_query($conn, "SELECT * FROM curso WHERE ID_curso in 
                                        (SELECT Curso_CA FROM curso_alumnos WHERE Alumnos_CA in 
                                        (SELECT idAlumno from alumnos where DNI = '$dni')); ");

        $result = $consulta->fetch_all(MYSQLI_ASSOC);

        echo json_encode($result);
    } else {

        $consulta = mysqli_query($conn, "SELECT * FROM curso");

        $result = $consulta->fetch_all(MYSQLI_ASSOC);

        echo json_encode($result);

    }
}
?>