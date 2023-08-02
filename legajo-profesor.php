<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        table {
            border: solid 2px #7e7c7c;
            border-collapse: collapse;
        }

        th, h1 {
            background-color: #edf797;
        }
        td, th {
            border: solid 1px #7e7c7c;
            padding: 2px;
            text-align: center;
        }
    </style>
</head>
<body>
</body>
</html>

<?php
$user = "root";
$pass = "";
$host = "localhost";
$datab = "gestion de alumnos";

$connection = mysqli_connect ($host,$user,$pass,$datab);

$Nombres = $_POST["nombre"];
$Apellido = $_POST["apellido"];
$Legajo = $_POST["legajo"];
$DNI = $_POST["dni"];
$Edad = $_POST["edad"];
$Fecha_Ingreso = $_POST["ingreso"];
$Titulo = $_POST["titulo"];
$Fecha_nacimiento = $_POST["nacimiento"];
$Domicilio = $_POST["domicilio"];
$Numero_Tel = $_POST["telefono"];
$Numero_cel = $_POST["celular"];
$Email = $_POST["email"];

if (!$connection){
    echo "No se a podido conectar al servidor" . mysqli_error();
}
else
{
    echo "<b><h3>Hemos conectado al servidor</h3></b>";
}

$db = mysqli_select_db ($connection,$datab);

if (!$db)
{
    echo "No se a podido encontrar la tabla";
}
else
{
    echo "<h3>Tabla seleccionada: profesores</h3>";
}

$instruction_sql = "INSERT INTO `profesores`(`numLegajo`, `Nombre`, `Apellido`, `DNI`, `Edad`, `Fecha de nacimiento`, `Numero de telefono`, `Numero de celular`, `Mail`, `Domicilio`, `Titulo`, `Fecha de ingreso`) 
VALUES ('$Legajo','$Nombres','$Apellido','$DNI','$Edad','$Fecha_nacimiento','$Numero_Tel','$Numero_cel','$Email','$Domicilio','$Titulo','$Fecha_Ingreso')";

$resultado = mysqli_query ($connection,$instruction_sql);

echo '<a href="index-legajo-profesor.html">Volver Atras<a/>';

?>