<?php
include("../php/lib/conn.php");

/* if (isset($_GET['buscador'])) {
    $buscador = $_GET['buscador'];
    $consulta = "SELECT * FROM alumnos WHERE DNI LIKE '%{$buscador}%' OR DNIe LIKE '%{$buscador}%';";
    $getQuery = mysqli_query($conn, $consulta);

    if ($getQuery) {
        $alumnos = mysqli_fetch_all($getQuery, MYSQLI_ASSOC);
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }
} else {
    $alumnos = mysqli_query($conn, "SELECT * FROM alumnos");
}

$resCurso = mysqli_query($conn, "SELECT * from alumnos") */
/* if (!isset($_POST['buscar'])) {
    $_POST['buscar'] = '';
}
if (!isset($_POST['buscacurso'])) {
    $_POST['buscacurso'] = '';
}
if (!isset($_POST['orden'])) {
    $_POST['orden'] = '';
    }
 */

if(isset($_GET['search'])){
    $searchQuery = $_GET['search'];
    $consulta = "SELECT * FROM alumnos WHERE DNI LIKE '%{$searchQuery}%' OR DNIe LIKE '%{$searchQuery}%';";
    $getQuery = mysqli_query($conn, $consulta);

    if ($getQuery) {
        $alumnos = mysqli_fetch_all($getQuery, MYSQLI_ASSOC);
    }

    else {
        echo "Error in the search query: " . mysqli_error($conn);
    }
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

    <h1>Alumnos</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <input type="text" name="search" placeholder="Buscar alumno">
        <input type="submit" value="Buscar">
    </form>

    <div>
        <table border="1">
            <tr>
                <td>DNI</td>
                <td>Apellido</td>
                <td>Nombre</td>
                <td>Curso</td>
                <td>Division</td>
                <td>Detalle</td>
            </tr>
            <tr>
                <?php
                foreach ($alumnos as $rowSql) {
                ?>
            <tr>
                <td><?php echo $rowSql['DNI'] ?></td>
                <td><?php echo $rowSql['apellidos'] ?></td>
                <td><?php echo $rowSql['nombres'] ?></td>
                <td>No hecho</td>
                <td>No hecho</td>
                <td><a href="alumno.php?idalumno=<?php echo $rowSql["idAlumno"]; ?>" class="a-detalles">Detalles</a></td>
            </tr>
        <?php
                }

        ?>
        </tr>

        </table>
    </div>

    <!--   ESTRUCTURA DE ALUMNOS CON TIPO CARDS DE RED SOCIAL
    <?php if (!empty($alumnos)) : ?>
        <div id="class-container">
            <?php foreach ($alumnos as $post) : ?>
                <div>
                    <a href="alumno.php?idalumno=<?php echo $post["idAlumno"]; ?>">
                        <h5><?= $post['apellidos'] . $post['nombres'] ?></h5>
                        <h5><?= $post['DNI'] . $post['DNIe'] ?></h5>
                        <button>Ver alumno</button>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p>No hay alumnos registrados.</p>
    <?php endif; ?> -->


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