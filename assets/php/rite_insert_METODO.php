<?php
include("../php/lib/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $profesor = $_POST["dni_profesor"];
    $alumno = $_POST["dni_alumno"];
    $materia = $_POST["materia"];
    $instancia = $_POST["instancias"];
    $fecha = $_POST["fecha"];

    // Obtener el número de legajo correspondiente al DNI del profesor
    $con_dni_prof = "SELECT profesores.numLegajo FROM profesores WHERE profesores.DNI = $profesor";
    $result_prof = mysqli_query($conn, $con_dni_prof);
    if ($row_prof = mysqli_fetch_assoc($result_prof)) {
        $profesor = $row_prof["numLegajo"];
    }

    // Obtener el número de legajo correspondiente al DNI del alumno
    $con_dni_alumn = "SELECT alumnos.idAlumno FROM alumnos WHERE alumnos.DNI = $alumno";
    $result_alumn = mysqli_query($conn, $con_dni_alumn);
    if ($row_alumn = mysqli_fetch_assoc($result_alumn)) {
        $alumno = $row_alumn["idAlumno"];
    }

    $trayectorias = array();
    for ($i = 1; $i <= 12; $i++) {
        $trayectorias[$i] = $_POST["trayect_" . $i];
    }

    // Realizar la inserción en la base de datos
    $sql = "INSERT INTO notas (Materia, Profesor, Alumno, Instancia, Fecha_nota";

    for ($i = 1; $i <= 12; $i++) {
        $sql .= ",nota_trayect_$i";
    }
    
    $sql .= ") VALUES ('$materia', '$profesor', '$alumno', '$instancia', '$fecha'";
    
    for ($i = 1; $i <= 12; $i++) {
        $sql .= ", '{$trayectorias[$i]}'";
    }
    
    $sql .= ")";
    
    if (mysqli_query($conn, $sql)) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar los datos: " . mysqli_error($conn);
    }

    header("location:../pages/rite_insert_HTML.php");
    mysqli_close($conn);
}
?>
