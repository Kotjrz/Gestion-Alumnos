<?php
include("../php/lib/conn.php");
$query = "SELECT * FROM alumnos";
$getQuery = mysqli_query($conn, $query);

if ($getQuery) {
    $alumnos = mysqli_fetch_all($getQuery, MYSQLI_ASSOC);
} else {
    echo "Error en la consulta: " . mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <?php if (!empty($alumnos)): ?>
        <div id="class-container">
            <?php foreach ($alumnos as $post) : ?>
                <div>
                <a href="alumno.php?idalumno=<?php echo $post["idAlumno"];?>">
                        <h5><?= $post['apellidos'] . $post['nombres']?></h5>
                        <h5><?= $post['DNI'] . $post['DNIe']?></h5>
                        <button>Ver alumno</button>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p>No hay alumnos registrados.</p>
    <?php endif; ?>
    <form action="" method="get">
        <input type="text" name="buscador" placeholder="Buscar Alumno por DNI"><br>
        <input type="submit" name="enviar" value="Buscar">
    </form>

    <a href="../../index.html">Volver</a>

</body>

</html>



<!-- if(isset($_GET['enviar']))
{
  $busqueda = $_GET['buscador'];
  $consulta = $conn->query("SELECT * FROM alumnos WHERE DNI LIKE '%{$busqueda}%' OR DNIe LIKE '%{$busqueda}%';");

  while($row = $consulta ->fetch_array())
  {
    echo $row['DNI'] . $row['DNIe'] . '<br>';
  } -->