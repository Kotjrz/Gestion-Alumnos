<?php
include '../php/lib/conn.php';


$nombre = $_POST["nombre"];
$materia = $_POST["materia"];
$categoria = $_POST["categoria"];
$fecha_ingreso = $_POST["fecha_ingreso"];
$fecha_finalizacion = $_POST["fecha_finalizacion"];
$grupo = $_POST["grupo"];
if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    $extraer_legajo = "SELECT profesores.numLegajo, profesores.DNI FROM profesores WHERE DNI = '$nombre'";
    $ejecutar_legajo = mysqli_query($conn, $extraer_legajo);

    foreach ($ejecutar_legajo as $legajo) {
        $insertarDatos = "INSERT INTO `profesor_materia`(`Profesor`, `Materia`, `categoria`, `toma_posecion`, `finalizacion`, `grupo`) VALUES ('{$legajo["numLegajo"]}', '$materia', '$categoria', '$fecha_ingreso', '$fecha_finalizacion', '$grupo')";

        $ejecutarInsertar = mysqli_query($conn, $insertarDatos);

        if (!$ejecutarInsertar) {
            echo "Error en la línea de SQL: " . mysqli_error($conn);
        }
    }
} else {
    echo "El campo DNI no fue enviado.";
}

header("location:../../index");
?>