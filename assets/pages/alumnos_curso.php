<?php

include '../php/lib/conn.php';

$query_cursos = "SELECT * FROM `curso`;";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso-Alumno</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["cantidad_alumno"])) {
    $cantidad_alumno = intval($_POST["cantidad_alumno"]);

    echo '<form method="post">';
    for ($i = 0; $i < $cantidad_alumno; $i++) {
        echo '<h2>Alumno #' . ($i + 1) . '</h2>';
        echo '<label for="dni_alumno_' . $i . '">Ingrese DNI del alumno</label>';
        echo '<input type="text" name="dni_alumno_' . $i . '" id="dni_alumno_' . $i . '"><br>';
        echo '<label for="grupo_alumno_' . $i . '">Grupo perteneciente: </label>';
        echo '<label for="grupo_alumno_' . $i . '_A">Grupo A</label>';
        echo '<input type="radio" name="grupo_alumno_' . $i . '" id="grupo_alumno_' . $i . '_A" value="A">';
        echo '<label for="grupo_alumno_' . $i . '_B">Grupo B</label>';
        echo '<input type="radio" name="grupo_alumno_' . $i . '" id="grupo_alumno_' . $i . '_B" value="B">';
    }
    echo '<br><br>';
    echo '<label for="curso">Seleccione un curso: </label>';
    echo '<select name="curso" id="curso">';
    echo '<option value="">Seleccione un curso...</option>';
    foreach (mysqli_query($conn, $query_cursos) as $row) {
        echo '<option value="' . $row["ID_curso"] . '">' . $row["Nombre_Curso"] . '-' . $row["Anio"] . '</option>';
    }
    echo '</select>';
    echo '<br><br>';
    echo '<input type="hidden" name="cantidad_alumno" value="' . $cantidad_alumno . '">';
    echo '<input type="submit" value="Registrar">';
    echo '</form>';
}
?>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["curso"]) && isset($_POST["cantidad_alumno"])) {
    $curso_alumno = $_POST["curso"];
    $cantidad_alumno = intval($_POST["cantidad_alumno"]);

    for ($i = 0; $i < $cantidad_alumno; $i++) {
        $dni_alumno = $_POST["dni_alumno_" . $i];
        $grupo_alumno = $_POST["grupo_alumno_" . $i];
        $legajos_consulta = "SELECT legajo_alumno.Legajo FROM legajo_alumno WHERE legajo_alumno.DNI = '" . mysqli_real_escape_string($connection, $dni_alumno) . "'";
        $legajo_confirmar = mysqli_query($connection, $legajos_consulta);

        if ($legajo_confirmar) {
            $fila = mysqli_fetch_assoc($legajo_confirmar);

            if ($fila) {
                $legajo = $fila["Legajo"];
                $query = "INSERT INTO `curso_alumnos`(`Curso_CA`, `Alumnos_CA`, `Grupo`) VALUES ('$curso_alumno','$legajo','$grupo_alumno');";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo 'Error al insertar datos: ' . mysqli_error($connection);
                }
            } else {
                echo 'No se encontró el Legajo para el DNI: ' . $dni_alumno;
            }
        } else {
            echo 'Error al consultar el Legajo: ' . mysqli_error($connection);
        }
    }
    header("location:../pages/alumnos_curso_cantidad.html");
}
?>