<?php
include '../php/lib/conn.php';

$consulta_curso = "SELECT * from curso";
$consulta_profesor = "SELECT * FROM profesores";
$consulta_materia = "SELECT materia.Id, materia.Nombre, curso.Nombre_Curso, curso.Anio FROM materia INNER JOIN curso ON materia.curso = curso.ID_curso;";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Materia</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <a href="../../index.html">Volver a HOME</a>
    <center>
        <h2>Formulario de Materia</h2>
        <form action="../php/materias_subida.php" method="post">
        <label for="materia">Nombre de la materia</label>
        <input type="text" name="materia"><br><br>
        <label for="curso">Curso</label>
        <select name="curso" id="curso">
            <option value="">Seleccione un curso</option>
            <?php foreach ($conn->query($consulta_curso)as $option){?>
                <option value="<?php echo $option["ID_curso"]?>"><?php echo $option["Nombre_Curso"]." - ".$option["Anio"]?></option>
            <?php } ?>
        </select><br><br>
        <label for="">Horario (escribir 'hora-hora')</label>
        <input type="text" id="horario1" name="horario" required><br><br>
        <button type="submit">Seguir a indicadores</button>
        </form>
    </center>
</body>
</html>
