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


    <form action="tabla-alumnos.php" method="post" name="form2">
        <input type="text" placeholder="Buscar" id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>">
        <h4>Filtros de busqueda</h4>
        <table>
            <thead>
                <tr>
                    <th>
                        Curso
                        <select name="buscacurso" id="buscacurso">
                            <?php if ($_POST["buscacurso"] != '') { ?>
                                <option value="<?php echo $_POST["buscacurso"]; ?>"><?php echo $_POST["buscacurso"]; ?></option>
                            <?php } ?>
                            <option value="">Todos</option>
                            <option value="">1ro</option>
                            <option value="">2do</option>
                            <option value="">3ro</option>
                            <option value="">4to</option>
                            <option value="">5to</option>
                            <option value="">6to</option>
                            <option value="">7mo</option>
                        </select>
                    </th>
                </tr>
            </thead>
        </table>
        <h4>Ordenar por</h4>
        <table>
            <thead>
                <tr>
                    <th>
                        Seleccione orden
                        <select name="orden" id="orden">
                            <?php if ($_POST["orden"] != '') { ?>
                                <option value="<?php echo $_POST["orden"]; ?>">
                                    <?php
                                    if ($_POST["orden"] == '1') {
                                        echo 'Ordenar por curso. Mayor a menor';
                                    }
                                    if ($_POST["orden"] == '2') {
                                        echo 'Ordenar por curso. Menor a mayor';
                                    }
                                    if ($_POST["orden"] == '3') {
                                        echo 'Ordenar por division. Mayor a menor';
                                    }
                                    if ($_POST["orden"] == '4') {
                                        echo 'Ordenar por division. Menor a Mayor';
                                    }
                                    if ($_POST["orden"] == '5') {
                                        echo 'Ordenar por DNI. Mayor a menor';
                                    }
                                    if ($_POST["orden"] == '6') {
                                        echo 'Ordenar por DNI. Menor a mayor';
                                    }
                                    ?>
                                </option>
                            <?php } ?>
                            <option value="">Sin ordenar</option>
                            <option value="1">Ordenar por curso. Mayor a menor</option>
                            <option value="2">Ordenar por curso. Menor a mayor</option>
                            <option value="3">Ordenar por division. Mayor a menor</option>
                            <option value="4">Ordenar por division. Menor a Mayor</option>
                            <option value="5">Ordenar por DNI. Mayor a menor</option>
                            <option value="6">Ordenar por DNI. Menor a mayor</option>
                        </select>
                    </th>
                </tr>
            </thead>
        </table>
        <input type="submit">
    </form>

    <?php
    if ($_POST['buscar'] = '') {
        $_POST['buscar'] = '';
    }
    $aKeyword = explode(' ', trim($_POST['buscar']));

    if ($_POST["buscar"] == '' and $_POST["buscausuario"] == '' and $_POST["orden"] == '') {
        $query = "SELECT * FROM alumnos";
    } else {

        if ($_POST["buscar"] != '') {
            $query = "WHERE (apellidos LIKE LOWER ('%".$aKeyword[0]."%') OR nombres LIKE LOWER ('%".$aKeyword[0]."%') OR DNI LIKE ('%".$aKeyword[0]."%')";
            for($i = 1; $i < count($aKeyword); $i++)
            {
                if(!empty($aKeyword[$i]))
                {
                    $query .= " OR apellidos LIKE '%" . $aKeyword[$i] . "%' OR nombres LIKE '%" . $aKeyword[$i] . "%' OR DNI LIKE '%" . $aKeyword[$i] . "%'";
                }
            }
        }
    }

    if($_POST["buscausuario"] != ''){
            $query .= "AND curso = '". $_POST['buscausuario'] . "'";
    }


    ?>


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
                $sql = "SELECT * from alumnos";
                $result = mysqli_query($conn, $sql);

                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?php echo $mostrar['DNI'] ?></td>
                <td><?php echo $mostrar['apellidos'] ?></td>
                <td><?php echo $mostrar['nombres'] ?></td>
                <td>No hecho</td>
                <td>No hecho</td>
                <td><a href="alumno.php?idalumno=<?php echo $mostrar["idAlumno"]; ?>" class="a-detalles">Detalles</a></td>
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