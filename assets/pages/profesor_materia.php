<?php
include '../php/lib/conn.php';

$consulta_profesor = "SELECT * from profesores";

$consulta_materia = "SELECT materia.Nombre,materia.id,curso.Nombre_Curso FROM materia INNER JOIN curso ON materia.curso = curso.ID_curso";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materia-docente</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
        <div class="formulario">
        <h1>MATERIA-DOCENTE</h1>
        <form action="../php/profesor_materia_metodo.php" method="POST">
            <label for="nombre">DNI:</label>
            <input type="number" id="nombre" name="nombre" placeholder="Ingrese su DNI" required><br>
            
                <label for="materia">Materia:</label>
                    <select name="materia">
                        <option value="">Seleccione una materia</option>
                        <?php foreach ($conn->query($consulta_materia) as $option) { ?>
                         <option value="<?php echo $option["id"] ?>"><?php echo $option["Nombre"] . " - " . $option["Nombre_Curso"]?></option>
                        <?php } ?>
                    </select><br>
                
                <label for="categoria">Categoria:</label>
                    <select id="categoria" name="categoria">
                        <option value="titular">Titular</option>
                        <option value="titular interino">Titular interino</option>
                        <option value="suplente">Suplente</option>
                        <option value="provisional">Provisional</option>
                    </select><br>
                <label for="fecha_ingreso">Fecha de ingreso:</label>
                <input type="date" id="fecha_ingreso" name="fecha_ingreso" required><br>

                <label for="fecha_finalizacion">Fecha de finalizacion:</label>
                <input type="date" id="fecha_finalizacion" name="fecha_finalizacion"><br>
                
                <label for="grupo">Grupo:</label>
                    <select id="grupo" name="grupo" required>
                        <option value="curricular"></option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="ambos">ambos</option>
                    </select> 
                    <br>
            <input type="submit" value="Enviar" name="registrarse">
        </form>
    </div>
</body>
</html>
