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
    <h2>Descripción Indicadores de materia</h2>
        <form action="../php/materias_indicadores.php" method="post">
            <label for="">Materia</label>
            <select name="materia">
                <option value="">Seleccione una materia</option>
                <?php foreach ($conn->query($consulta_materia) as $option) { ?>
                    <option value="<?php echo $option["Id"] ?>"><?php echo $option["Nombre"] . " - " . $option["Nombre_Curso"]?></option>
                <?php } ?>
            </select>
            <br><br>
            <h3>Indicadores de 1era instancia</h3>
            <?php for ($i = 1; $i <= 12; $i++) { ?>
                <label for="ind_<?php echo $i ?>_1era">Indicador <?php echo $i ?>:</label>
                <input type="text" id="ind_<?php echo $i ?>_1era" name="ind_<?php echo $i ?>_1era"><br>
            <?php } ?>
            <h3>Indicadores de 2nda instancia</h3>
            <?php for ($i = 1; $i <= 12; $i++) { ?>
                <label for="ind_<?php echo $i ?>_2nda">Indicador <?php echo $i ?>:</label>
                <input type="text" id="ind_<?php echo $i ?>_2nda" name="ind_<?php echo $i ?>_2nda"><br>
            <?php } ?>
            <h3>Indicadores de 3era instancia</h3>
            <?php for ($i = 1; $i <= 12; $i++) { ?>
                <label for="ind_<?php echo $i ?>_3era">Indicador <?php echo $i ?>:</label>
                <input type="text" id="ind_<?php echo $i ?>_3era" name="ind_<?php echo $i ?>_3era"><br>
            <?php } ?>
            <h3>Indicadores de 4ta instancia</h3>
            <?php for ($i = 1; $i <= 12; $i++) { ?>
                <label for="ind_<?php echo $i ?>_4ta">Indicador <?php echo $i ?>:</label>
                <input type="text" id="ind_<?php echo $i ?>_4ta" name="ind_<?php echo $i ?>_4ta"><br>
            <?php } ?>
            <br>
            <button type="submit">Subir Indicadores</button>
    </form>
    </center>
</body>
</html>