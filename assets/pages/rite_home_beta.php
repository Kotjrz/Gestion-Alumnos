<?php
include("../php/lib/conn.php");

$query_cursos = "SELECT DISTINCT Anio FROM curso ORDER BY Anio ASC;";
$resultado_curso = mysqli_query($conn, $query_cursos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccione un Curso</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
    <a href="../pages/rite_insert_HTML.php">Crear RITE Nuevo...</a><br>
    <a href="../../index.html">Volver a HOME</a><br>

    <form method="post" action="../php/rite_insert_METODO_beta.php">
        <h2>Seleccione un curso junto a su división y ciclo lectivo correspondiente</h2>
        <select name="curso" id="curso">
            <option value="">Curso...</option>
            <option value="1°">1°</option>
            <option value="2°">2°</option>
            <option value="3°">3°</option>
            <option value="4°">4°</option>
            <option value="5°">5°</option>
            <option value="6°">6°</option>
            <option value="7°">7°</option>
        </select>
        <select name="division" id="division">
            <option value="">División...</option>
            <option value="1°">1°</option>
            <option value="2°">2°</option>
            <option value="3°">3°</option>
            <option value="4°">4°</option>
            <option value="5°">5°</option>
        </select>
        <select name="anios" id="anios">
            <option value="">Ciclo Lectivo...</option>
            <?php foreach($resultado_curso as $anios){?>
                <option value="<?php echo $anios["Anio"]?>"><?php echo $anios["Anio"]?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Buscar curso">
    </form>
</body>
</html>