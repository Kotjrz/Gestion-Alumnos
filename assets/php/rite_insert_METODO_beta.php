<?php
include("../php/lib/conn.php");

// Obtén los valores de curso y división desde la página anterior
$curso = $_POST["curso"];
$division = $_POST["division"];
$anio = $_POST["anios"];

$curso_division = $curso . $division;

$query_id_curso = "SELECT ID_curso FROM curso WHERE Nombre_Curso = '$curso_division' AND Anio = '$anio';";
$resultado_id_curso = mysqli_query($conn, $query_id_curso);

$fila_id_curso = mysqli_fetch_assoc($resultado_id_curso);
$id_curso = $fila_id_curso['ID_curso'];

$query_alumnos = "SELECT alumnos.idAlumno, alumnos.nombres, alumnos.apellidos FROM curso_alumnos 
INNER JOIN alumnos ON curso_alumnos.Alumnos_CA = alumnos.idAlumno 
INNER JOIN curso ON curso_alumnos.Curso_CA = curso.ID_curso 
WHERE curso.ID_curso = $id_curso;";

$resultado_alumnos = mysqli_query($conn, $query_alumnos);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method='post'>
        <h2>Seleccione un alumno</h2>
        <select name='alumno' id='alumno'>
            <option value=''>Alumnos...</option>
            <?php foreach ($resultado_alumnos as $alumnos) { ?>
                <option value='<?php echo $alumnos['idAlumno'] ?>'><?php echo $alumnos['nombres'] . " " . $alumnos['apellidos'] ?></option>
            <?php } ?>
        </select>
        <input type='submit' value='Generar Tablas'>
    </form>
</body>
</html>
<?php
if (isset($_POST['alumno'])) {
    $alumno = $_POST['alumno'];
    $instancia = array('1era_Instancia', '2nda_Instancia', '3era_Instancia', '4ta_Instancia');  
    // Recopila los años de participación del alumno
    $query_anios_participacion = "SELECT DISTINCT curso.Anio FROM curso 
                                INNER JOIN materia ON curso.ID_curso = materia.curso 
                                INNER JOIN notas ON materia.Id = notas.Materia 
                                INNER JOIN alumnos ON alumnos.idAlumno = notas.Alumno
                                WHERE alumnos.idAlumno = '$alumno'";
        
    $resultado_anios = mysqli_query($conn, $query_anios_participacion);

    // Crear un array para almacenar los años de participación
    $aniosParticipacion = [];
    while ($row_anio = mysqli_fetch_assoc($resultado_anios)) {
        $aniosParticipacion[] = $row_anio["Anio"];
    }
    $contador_instancia = 0;
    $query = "SELECT * FROM alumnos WHERE idAlumno = '$alumno'";
    $nom = mysqli_query($conn, $query);
    foreach ($nom as $nombre) {
        echo "<h1 style='text-align: center;'>Notas por instancia de " . $nombre["nombres"] . " " . $nombre["apellidos"] . "</h1>";
    }
    $anoActual = '';
    foreach ($aniosParticipacion as $anoParticipacion) {
        echo "<h2>Notas del año $anoParticipacion"."<br><br>";
        foreach ($instancia as $inst) {    
            $consulta_mostrar="SELECT materia.Nombre, curso.Nombre_Curso, profesores.Nombre_profesor ,profesores.Apellido_profesor, 
                                alumnos.nombres, alumnos.apellidos, notas.Fecha_nota, 
                                notas.nota_trayect_1, notas.nota_trayect_2, 
                                notas.nota_trayect_3, notas.nota_trayect_4,notas.nota_trayect_5, 
                                notas.nota_trayect_6,  notas.nota_trayect_7,
                                notas.nota_trayect_8,  notas.nota_trayect_9, notas.nota_trayect_10, 
                                notas.nota_trayect_11, notas.nota_trayect_12 
                                FROM notas INNER JOIN alumnos ON alumnos.idAlumno = notas.Alumno INNER JOIN materia 
                                ON materia.Id = notas.Materia INNER JOIN curso ON curso.ID_curso = materia.curso INNER JOIN profesores 
                                ON profesores.numLegajo = notas.Profesor WHERE notas.Instancia = '$inst' AND alumnos.idAlumno = '$alumno' 
                                AND curso.Anio = '$anoParticipacion'";
            echo "<h3>$inst</h3>";
            echo "<table border='1'>
                            <tr>
                                <td>Materia</td>
                                <td>Curso</td>
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
        
                    foreach ($conn->query($consulta_mostrar) as $row) {
                        echo "<tr>
                                <td>" . $row["Nombre"] . "</td>
                                <td>" . $row["Nombre_Curso"] . "</td>
                                <td>" . $row["Nombre_profesor"] . " " . $row["Apellido_profesor"] . "</td>";
        
                        $totalTrayect = 0;
                        $trayectCount = 0;
        
                        for ($y = 1; $y <= 12; $y++) {
                            $trayect = $row["nota_trayect_" . $y];
                            $valorImpreso = ($trayect !== '0') ? $trayect : "N/U";
                            echo "<td>" . htmlspecialchars($valorImpreso) . "</td>";
        
                            if ($trayect !== '0') {
                                $totalTrayect += $trayect;
                                $trayectCount++;
                            }
                        }
        
                        $trayectoria = $trayectCount > 0 ? $totalTrayect / $trayectCount : 0;
                        $numerico = $trayectoria * 2;
                        $trayect_num = ceil($numerico);
        
                        if ($trayect_num <= 4) {
                            $trayectoriaprint = "TED";
                        } else if ($trayect_num > 4 && $trayect_num < 6) {
                            $trayectoriaprint = "TEP";
                        } else {
                            $trayectoriaprint = "TEA";
                        }
        
                        echo "<td>" . $trayect_num . "</td>";
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
