<?php
include '../php/lib/conn.php';

$query_cursos = "SELECT * FROM `curso`;";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Lista de Alumnos</h1>
    <a href="../../index.html">Volver a HOME</a><br>
    <form method="post">
        <label for="curso">Seleccione un curso:</label>
        <select name="curso" id="curso">
            <option value="">Seleccione un curso...</option>
            <?php foreach (mysqli_query($conn,$query_cursos)as $row){?>
                <option value="<?php echo $row["Nombre_Curso"]?>"><?php echo $row["Nombre_Curso"]?></option>
            <?php } ?>
        </select>
        <label for="anio">Seleccione un año:</label>
        <select name="anio" id="anio">
            <option value="">Seleccione un año...</option>
            <?php foreach (mysqli_query($conn,$query_cursos)as $row){?>
                <option value="<?php echo $row["Anio"]?>"><?php echo $row["Anio"]?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Generar Tablas">
    </form>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['curso']) && isset($_POST['anio'])) {
    $curso = $_POST['curso'];
    $anio = $_POST['anio'];

    $consulta = "SELECT alumnos.DNI,alumnos.nombres, alumnos.apellidos, curso_alumnos.Grupo 
                 FROM curso_alumnos 
                 INNER JOIN alumnos ON curso_alumnos.Alumnos_CA = alumnos.DNI 
                 INNER JOIN curso ON curso_alumnos.Curso_CA = curso.ID_curso 
                 WHERE curso.Nombre_Curso = '$curso' AND curso.Anio = '$anio'";

    $result = mysqli_query($conn, $consulta);


    while ($alumno = mysqli_fetch_assoc($result)) {
        echo '<h2>De ' . $curso . ' (' . $anio . ')</h2>';
        echo '<table border="1">';
        echo '<tr>';
        echo '<td>DNI</td>';
        echo '<td>Nombre</td>';
        echo '<td>Grupo</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td>' . $alumno["DNI"] . '</td>';
        echo '<td>' . $alumno["Nombre_alumno"] . " " . $alumno["Apellido_alumno"] . '</td>';
        echo '<td>' . $alumno["Grupo"] . '</td>';      
    }
    echo '</tr>';
    echo '</table>';
}
?>
</body>
</html>