<?php
include '../php/lib/conn.php';


$consulta_materia = "SELECT materia.Id, materia.Nombre, curso.Nombre_Curso, curso.Anio FROM materia INNER JOIN curso ON materia.curso = curso.ID_curso;";
$consulta_profesor = "SELECT * FROM profesores";
$consulta_alumno = "SELECT * FROM alumnos";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de notas</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
    <a href="../../index.html">Volver a HOME</a>
    <center>
        <h1>Registro de Notas</h1>
        <form action="../php/rite_insert_METODO.php" method="post">
            <label for="materia">Materia</label>
            <select name="materia" id="materia">
                <option value="">Seleccione una materia</option>
                <?php foreach ($conn->query($consulta_materia) as $option) { ?>
                    <option value="<?php echo $option["Id"] ?>"><?php echo $option["Nombre"] . " - " . $option["Nombre_Curso"] . " - " . $option["Anio"] ?></option>
                <?php } ?>
            </select>
            <?php echo "  -  " ?>
            <label for="profesor">Profesor</label>
            <select name="profesor" id="profesor">
                <option value="">Seleccione un profesor</option>
                <?php foreach ($conn->query($consulta_profesor) as $option) { ?>
                    <option value="<?php echo $option["DNI"] ?>"><?php echo $option["Nombre"] . " " . $option["Apellido"]?></option>
                <?php } ?>
            </select>
            <br><br>
            <label for="alumno">Alumno</label>
            <select name="alumno" id="alumno">
                <option value="">Seleccione un Alumno</option>
                <?php foreach ($conn->query($consulta_alumno) as $option) { ?>
                    <option value="<?php echo $option["DNI"] ?>"><?php echo $option["nombres"] . " " . $option["apellidos"]?></option>
                <?php } ?>
            </select>
            <?php echo "  -  " ?>
            <label for="instancia">Instancia</label>
            <select name="instancias" id="instancia">
                <option value="">Seleccione una instancia</option>
                <option value="1era_Instancia">1era instancia</option>
                <option value="2nda_Instancia">2nda instancia</option>
                <option value="3era_Instancia">3era instancia</option>
                <option value="4ta_Instancia">4ta instancia</option>
            </select>
            <br><br>
            <?php for ($i = 1; $i <= 12; $i++) { ?>
                <label for="ind_<?php echo $i ?>">Indicador <?php echo $i ?>:</label>
                <input type="text" id="ind_<?php echo $i ?>" name="ind_<?php echo $i ?>"><br>
                <label for="ind_<?php echo $i ?>">Trayectoria <?php echo $i ?>:</label>
                <input type="text" id="trayect_<?php echo $i ?>" name="trayect_<?php echo $i ?>">
                <br><br>
            <?php } ?>
            <label for="fecha">Fecha de RITE</label>
            <input type="date" name="fecha" id="fecha">
            <br><br>
            <button type="submit">Subir Nota</button>
        </form>
    </center>
</body>
</html>