<?php

include '../php/lib/conn.php';

$instancia = array('1era_Instancia', '2nda_Instancia', '3era_Instancia', '4ta_Instancia');

$query_anios_distintos = "SELECT DISTINCT Anio FROM curso";
$resultado_anios = mysqli_query($conn, $query_anios_distintos);

$anios_disponibles = [];
while ($row_anio = mysqli_fetch_assoc($resultado_anios)) {
    $anios_disponibles[] = $row_anio["Anio"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
    <a href="../pages/rite_insert_HTML.php">Crear RITE Nuevo...</a><br>
    <a href="../../index.html">Volver a HOME</a><br>

    <form method="post">
        <label for="dni">Ingrese el DNI del alumno:</label>
        <input type="text" name="dni" id="dni">
        <input type="submit" value="Generar Tablas">
    </form>

<?php
if (isset($_POST['dni'])) {
    $dni = $_POST['dni'];

    // Recopila los años de participación del alumno
    $query_anios_participacion = "SELECT DISTINCT curso.Anio FROM curso 
                                        INNER JOIN materia ON curso.ID_curso = materia.curso 
                                        INNER JOIN notas ON materia.Id = notas.Materia 
                                        INNER JOIN alumnos ON alumnos.DNI = notas.Alumno
                                        WHERE legajo_alumno.DNI = '$dni'";

    $resultado_anios = mysqli_query($conn, $query_anios_participacion);

    // Crear un array para almacenar los años de participación
    $aniosParticipacion = [];
    while ($row_anio = mysqli_fetch_assoc($resultado_anios)) {
        $aniosParticipacion[] = $row_anio["Anio"];
    }
    $contador_instancia = 0;
    $query = "SELECT * FROM legajo_alumno WHERE DNI = '$dni'";
    $nom = mysqli_query($connection, $query);
    foreach ($nom as $nombre) {
        echo "<h1 style='text-align: center;'>Notas por instancia de " . $nombre["DNI"] . " " . $nombre["Apellido_alumno"] . "</h1>";
    }
    $anoActual = '';
    foreach ($aniosParticipacion as $anoParticipacion) {
        echo "<h2>Notas del año $anoParticipacion"."<br><br>";
        foreach ($instancia as $inst) {    
            $consulta_mostrar="SELECT materia.Nombre, curso.Nombre_Curso, curso.Anio, profesores.Nombre_profesor ,profesores.Apellido_profesor, legajo_alumno.Nombre_alumno, legajo_alumno.Apellido_alumno, notas.Fecha_nota, 
                            notas.nota_ind1, notas.nota_trayect_1, notas.nota_ind2, notas.nota_trayect_2, notas.nota_ind3, 
                            notas.nota_trayect_3, notas.nota_ind4, notas.nota_trayect_4, notas.nota_ind5, notas.nota_trayect_5, 
                            notas.nota_ind6, notas.nota_trayect_6, notas.nota_ind7, notas.nota_trayect_7, notas.nota_ind8, 
                            notas.nota_trayect_8, notas.nota_ind9, notas.nota_trayect_9, notas.nota_ind10, notas.nota_trayect_10, 
                            notas.nota_ind11, notas.nota_trayect_11, notas.nota_ind12, notas.nota_trayect_12 
                            FROM notas INNER JOIN alumnos ON alumnos.DNI = notas.Alumno INNER JOIN materia 
                            ON materia.Id = notas.Materia INNER JOIN curso ON curso.ID_curso = materia.curso INNER JOIN profesores 
                            ON profesores.DNI = notas.Profesor WHERE notas.Instancia = '$inst' AND alumnos.DNI = '$dni' 
                            AND curso.Anio = '$anoParticipacion'";
            echo "<h3>$inst</h3>";
            echo "<table border='1'>
                    <tr>
                        <td>Materia</td>
                        <td>Año - Curso</td>
                        <td>Profesor</td>
                        <td>Ind1</td>
                        <td>Ind2</td>
                        <td>Ind3</td>
                        <td>Ind4</td>
                        <td>Ind5</td>
                        <td>Ind6</td>
                        <td>Ind7</td>
                        <td>Ind8</td>
                        <td>Ind9</td>
                        <td>Ind10</td>
                        <td>Ind11</td>
                        <td>Ind12</td>
                        <td>Promedio</td>
                        <td>Trayectoria</td>
                        <td>Fecha de RITE</td>
                    </tr>";

            foreach ($connection->query($consulta_mostrar) as $row) {
                echo "<tr>
                        <td>" . $row["Nombre"] . "</td>
                        <td>" . $row["Nombre_Curso"] . "-" . $row["Anio"] . "</td>
                        <td>" . $row["Nombre_profesor"] . " " . $row["Apellido_profesor"] . "</td>";

                $totalNotas = 0;
                $notasCount = 0;

                for ($i = 1; $i <= 12; $i++) {
                    $nota = $row["nota_ind" . $i];
                    $valorImpreso = ($nota !== '0') ? $nota : "N/U";
                    echo "<td>" . htmlspecialchars($valorImpreso) . "</td>";

                    if ($nota !== '0') { // Solo si la nota no es nula
                        $totalNotas += $nota;
                        $notasCount++;
                    }
                }

                $promedio = $notasCount > 0 ? $totalNotas / $notasCount : 0;
                echo "<td>" . $promedio . "</td>";

                $totalTrayect = 0;
                $trayectCount = 0;

                for ($y = 1; $y <= 12; $y++) {
                    $trayect = $row["nota_trayect_" . $y];

                    if ($trayect !== '0') {
                        $totalTrayect += $trayect;
                        $trayectCount++;
                    }
                }

                $trayectoria = $trayectCount > 0 ? $totalTrayect / $trayectCount : 0;
                if ($trayectoria < 3) {
                    $trayectoriaprint = "TED";
                } else if ($trayectoria >= 3 && $trayectoria < 4) {
                    $trayectoriaprint = "TEP";
                } else {
                    $trayectoriaprint = "TEA";
                }

                echo "<td>" . $trayectoriaprint . "</td>";
                echo "<td>" . $row["Fecha_nota"] . "</td>";
                echo "</tr>";

               // Verifica la trayectoria y agrega las materias a $previas
               if ($trayectoriaprint === "TEP" || $trayectoriaprint === "TED") {
                $previas[] = [
                    "Nombre" => $row["Nombre"],
                    "Nombre_Curso" => $row["Nombre_Curso"],
                    "Fecha_nota" => $row["Fecha_nota"],
                    "Instancia" => $inst,  // Agrega la instancia correspondiente
                ];
            }
        }

        echo "</table>";
    }
    if ($contador_instancia % 4 == 0) {
        if (!empty($previas)) {
            echo "<h3>Previas</h3>";
            echo "<table border='1'>
                    <tr>
                        <td>Materia</td>
                        <td>Curso - Año</td>
                        <td>Instancia</td>
                        <td>Fecha de RITE</td>
                    </tr>";

            foreach ($previas as $previa) {
                echo "<tr>
                        <td>" . $previa["Nombre"] . "</td>
                        <td>" . $previa["Nombre_Curso"] . "</td>
                        <td>" . $previa["Instancia"] . "</td>
                        <td>" . $previa["Fecha_nota"] . "</td>
                      </tr>";
            }

            echo "</table>";
        }

        // Reinicia el array $previas
        $previas = array();
    }
}
}
?>
</body>
</html>
