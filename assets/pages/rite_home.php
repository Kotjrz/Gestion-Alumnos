<?php
include("../php/lib/conn.php");

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
    <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                text-align: center;
            }

            a {
                text-decoration: none;
                background-color: #000000;
            }

            form {
                margin-top: 20px;
            }

            label {
                font-weight: bold;
            }

            input {
                width: 50%; /* Ancho del 100% para ocupar todo el espacio disponible */
                padding: 10px; /* Espaciado interno */
                box-sizing: border-box; /* Incluye el ancho del borde y el relleno en el ancho total */
                margin-bottom: 10px; /* Espacio entre inputs */

            }

            table {
                border-collapse: collapse;
                width: 80%;
                margin: 20px auto;
            }

            table, th, td {
                border: 1px solid #ddd;
            }

            th, td {
                padding: 10px;
                text-align: center;
            }

            h1, h3 {
                text-align: left;
                margin-left: 70px;
            }

            h2{
                text-align: left;
                padding-top: 10px;
                padding-left: 10px
            }
            .buttonanios{
                background-color: #000000; /* Cambia el color del botón según tus preferencias */
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-decoration: none;
                height: 50px;
                width: 90%;
                margin-left: 5%;
            }

            button:hover {
                background-color: #272727;
            }

            .instancias{
                padding-top: 10px;
                padding-bottom: 10px;
                width: 90%;
                margin-left: 5%;
                height: 100%;
                background-color: rgb(218, 218, 218);
            }

            .instancias_titulos{
                background-color: darkgray;
            }

            .instancias_contenido{
                background-color: white;
            }

    </style>
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
                                    INNER JOIN alumnos ON alumnos.idAlumno = notas.Alumno
                                    WHERE alumnos.DNI = '$dni'";

        $resultado_anios = mysqli_query($conn, $query_anios_participacion);

        $instancia = array('1era_Instancia', '2nda_Instancia', '3era_Instancia', '4ta_Instancia');

        // Crear un array para almacenar los años de participación
        $aniosParticipacion = [];
        while ($row_anio = mysqli_fetch_assoc($resultado_anios)) {
            $aniosParticipacion[] = $row_anio["Anio"];
        }

        $query = "SELECT * FROM alumnos WHERE DNI = '$dni'";
        $nom = mysqli_query($conn, $query);

        foreach ($nom as $nombre) {
            echo "<h1 style='text-align: center;'>Notas por instancia de " . $nombre["nombres"] . " " . $nombre["apellidos"] . "</h1>";
        }

        foreach ($aniosParticipacion as $anoParticipacion) {

            echo '<div class="buttonanios">';
            echo "<h2>Notas del año $anoParticipacion</h2>";
            echo "</div>";
            // Crear un array para almacenar los nombres de las materias con sus respectivas trayectorias
            $materias_promedios = [];

            echo '<div class="instancias">';
            foreach ($instancia as $inst) {

                $consulta_mostrar = "SELECT id_nota,materia.Nombre, curso.Nombre_Curso, curso.Anio, profesores.Nombres, profesores.Apellidos, 
                                    alumnos.nombres, alumnos.apellidos, notas.Fecha_nota, 
                                    notas.nota_trayect_1, notas.nota_trayect_2,
                                    notas.nota_trayect_3, notas.nota_trayect_4, notas.nota_trayect_5, 
                                    notas.nota_trayect_6, notas.nota_trayect_7, notas.nota_trayect_8, notas.nota_trayect_9, 
                                    notas.nota_trayect_10, notas.nota_trayect_11, notas.nota_trayect_12 
                                    FROM notas INNER JOIN alumnos ON alumnos.idAlumno = notas.Alumno INNER JOIN materia 
                                    ON materia.Id = notas.Materia INNER JOIN curso ON curso.ID_curso = materia.curso INNER JOIN profesores 
                                    ON profesores.DNI = notas.Profesor WHERE notas.Instancia = '$inst' AND alumnos.DNI = '$dni' 
                                    AND curso.Anio = '$anoParticipacion'";

                $resultado_mostrar = mysqli_query($conn, $consulta_mostrar);

                echo "<table border='1'>";

                if($inst=='1era_Instancia'){
                    echo "<h3>Observación de Mayo</h3>";
                }elseif($inst=='2nda_Instancia'){
                    echo "<h3>Fin del primer periodo de Agosto</h3>";
                }elseif($inst=='3era_Instancia'){
                    echo "<h3>Observación de Octubre</h3>";
                }else{
                    echo "<h3>Fin del periodo final de Diciembre</h3>";
                }

                echo '<tr>';
                echo "<td class='instancias_titulos'>Materia</td>";
                echo "<td class='instancias_titulos'>Curso</td>";
                echo "<td class='instancias_titulos'>Profesor</td>";
                echo "<td class='instancias_titulos'>Ind1</td>";
                echo "<td class='instancias_titulos'>Ind2</td>";
                echo "<td class='instancias_titulos'>Ind3</td>";
                echo "<td class='instancias_titulos'>Ind4</td>";
                echo "<td class='instancias_titulos'>Ind5</td>";
                echo "<td class='instancias_titulos'>Ind6</td>";
                echo "<td class='instancias_titulos'>Ind7</td>";
                echo "<td class='instancias_titulos'>Ind8</td>";
                echo "<td class='instancias_titulos'>Ind9</td>";
                echo "<td class='instancias_titulos'>Ind10</td>";
                echo "<td class='instancias_titulos'>Ind11</td>";
                echo "<td class='instancias_titulos'>Ind12</td>";
                echo "<td class='instancias_titulos'>Promedio</td>";
                echo "<td class='instancias_titulos'>Trayectoria</td>";
                echo "<td class='instancias_titulos'>Fecha de RITE</td>";
                echo "</tr>";

                foreach ($resultado_mostrar as $row) {
                    echo "<tr>
                        <td class='instancias_contenido'>" . $row["Nombre"] . "</td>
                        <td class='instancias_contenido'>" . $row["Nombre_Curso"] . "</td>
                        <td class='instancias_contenido'>" . $row["Nombres"] . " " . $row["Apellidos"] . "</td>";

                    $totalNotas = 0;
                    $notasCount = 0;

                    $materias = $row["Nombre"];
                    $notas = array();

                    for ($i = 1; $i <= 12; $i++) {
                        $nota = $row["nota_trayect_" . $i];
                        $valorImpreso = ($nota !== '0') ? $nota : "N/U";
                        echo "<td class='instancias_contenido'>" . htmlspecialchars($valorImpreso) . "</td>";

                        if ($nota !== '0') { // Solo si la nota no es nula
                            $totalNotas += $nota;
                            $notasCount++;
                            $notas[] = $nota;
                        }
                    }

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
                    $numerico = $trayectoria * 2;
                    $trayect_num = number_format($numerico,2);

                    if (!isset($materias_promedio[$materias])) {
                        $materias_promedio[$materias] = array();
                    }
                    $materias_promedio[$materias][$inst] = count($notas) > 0 ? array_sum($notas) / count($notas) : 0;

                    echo "<td class='instancias_contenido'>" . $trayect_num . "</td>";

                    if ($trayectoria <= 2) {
                        echo "<td class='instancias_contenido' style='background-color:red'>TED</td>";
                    } else if ($trayectoria > 2 && $trayectoria < 4) {
                        echo "<td class='instancias_contenido' style='background-color:yellow'>TEP</td>";
                    }else{
                        echo "<td class='instancias_contenido' style='background-color:green'>TEA</td>";
                    }
                    echo "<td class='instancias_contenido'>" . $row["Fecha_nota"] . "</td>";
                    echo '<td><a href="..\pages\modificar_RITE.php?id_nota='. $row["id_nota"].'" class="button-medium-update">Actulizar</a></td>';
                    echo "</tr>";
                }

                echo "</table>";
            }

            // Mostrar el nombre de las materias con notas finales
            echo "<table border =1>";
            echo "<h3>Promedio Final de Diciembre/Febrero:</h3>";
            echo "<tr>";
            echo "<td class='instancias_titulos'>Materia</td>";
            echo "<td class='instancias_titulos'>Promedio</td>";
            echo "<td class='instancias_titulos'>Trayectoria</td>";
            echo "<td class='instancias_titulos'>Estado</td>";
            echo "</tr>";

            // Calcular y mostrar el promedio general de las instancias para cada materia
            foreach ($materias_promedio as $materia => $instancia_promedios) {
                $promedioGeneral = array_sum($instancia_promedios) / count($instancia_promedios);
                $promedioFinal = $promedioGeneral * 2;
                $promedioArreglado = ceil($promedioFinal);
                
                // Variable auxiliar para detectar si se encontró una nota menor a 3
                $notaMenorATres = false;
                
                // Verificar si alguna nota en el array es menor a 3
                foreach ($instancia_promedios as $instancia_promedio) {
                    if ($instancia_promedio < 3
                    ) {
                        $notaMenorATres = true;
                        break; // Salir del bucle si se encuentra una nota menor a 3
                    }
                }
                
                echo "<tr>";
                echo "<td class='instancias_contenido'>$materia</td>";

                // Establecer los valores de $finalesprint y $estadofinal
                if ($notaMenorATres) {
                    echo "<td class='instancias_contenido'>---</td>";
                    echo "<td class='instancias_contenido' style='background-color: yellow'>TEP</td>";
                    echo "<td class='instancias_contenido'>Periodo de Intensificación</td>";
                } else {
                    if($promedioGeneral > 2 && $promedioGeneral < 4){
                        echo "<td class='instancias_contenido'>---</td>";
                        echo "<td class='instancias_contenido' style='background-color: yellow'>TEP</td>";
                        echo "<td class='instancias_contenido'>Periodo de Intensificación</td>";
                    } else{
                        echo "<td class='instancias_contenido'>$promedioArreglado</td>";
                        echo "<td class='instancias_contenido' style='background-color: green'>TEA</td>";
                        echo "<td class='instancias_contenido'>Aprobado</td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
            // Limpiar el array para el próximo año
            $materias_promedio = [];
            echo "</div>";
        }
    }
    ?>
</body>
</html>