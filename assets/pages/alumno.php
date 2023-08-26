<?php
include("../php/lib/conn.php");

$id_alumno = $_GET['idalumno'];

$sql_alumno = "SELECT * FROM alumnos WHERE idAlumno = '$id_alumno'";

$alumno = mysqli_query($conn, $sql_alumno);

$row = mysqli_fetch_assoc($alumno);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php
echo '<h4>Nombre del alumno</h4>' . $row['nombres'];
echo '<br>';
echo '<h4>Apellido del alumno</h4>' . $row['apellidos'];
echo '<br>';
echo  '<h4>DNI</h4>' . $row['DNI'];
echo '<br>';
echo '<h4>CUIL</h4>'. $row['CUIL'];
echo '<br>'
?>

    
    <a href="../pages/tabla-alumnos.php">Volver</a>
</body>
</html>