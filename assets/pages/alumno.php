<?php
include("../php/lib/conn.php");

$id_alumno = $_GET['idalumno'];

$sql_alumno = "SELECT * FROM alumnos WHERE idAlumno = $id_alumno";

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
echo $row['nombres'];
echo '<br>';
echo $row['apellidos'];
echo '<br>';
echo $row['DNI'];
echo '<br>';
echo $row['CUIL'];
?>

    
    <a href="../pages/tabla-alumnos.php">Volver</a>
</body>
</html>