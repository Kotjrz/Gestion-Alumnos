<?php
include '../php/lib/conn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $profesor = $_POST["profesor"];
    $alumno = $_POST["alumno"];
    $materia = $_POST["materia"];
    $instancia = $_POST["instancias"];
    $fecha = $_POST["fecha"];

    $indicadores = array();
    $trayectorias = array();
    for ($i = 1; $i <= 12; $i++) {
        $indicadores[$i] = $_POST["ind_" . $i];
        $trayectorias[$i] = $_POST["trayect_" . $i];
    }

    // Realizar la inserción en la base de datos
    $sql = "INSERT INTO notas (Materia, Profesor, Alumno, Instancia, Fecha_nota";

    for ($i = 1; $i <= 12; $i++) {
        $sql .= ", nota_ind$i, nota_trayect_$i";
    }
    
    $sql .= ") VALUES ('$materia', '$profesor', '$alumno', '$instancia', '$fecha'";
    
    for ($i = 1; $i <= 12; $i++) {
        $sql .= ", '{$indicadores[$i]}', '{$trayectorias[$i]}'";
    }
    
    $sql .= ")";
    
    if (mysqli_query($conn, $sql)) {
        echo "Datos insertados correctamente.";
        echo "<br>";
        echo "<a href='../../index.html'>Volver a HOME</a>";
    } else {
        echo "Error al insertar los datos: " . mysqli_error($connection);
        echo "<br>";
        echo "<a href='../../index.html'>Volver a HOME</a>";
    }

    mysqli_close($conn);
}
?>
