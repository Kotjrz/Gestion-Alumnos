<?php

include("../php/lib/conn.php");

// Define la pagina actual
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$search = isset($_GET['search']) ? $_GET['search'] : '';

//Cantidad de elementos por pagina
$limit = 10;

// calcula el offset
$offset = ($page - 1) * $limit;

$whereClause = '';
if ($search != '') {
    $whereClause = "WHERE DNI LIKE '%$search%' OR DNIe LIKE '%$search%'";
}


// usando el limite y el offset calcula la consulta
$consultaPaginacion = "SELECT * FROM alumnos $whereClause LIMIT $limit OFFSET $offset";
$getQueryPaginacion = mysqli_query($conn, $consultaPaginacion);

// Cantidad deintems
$consultaTotal = "SELECT COUNT(*) as total FROM alumnos $whereClause";
$getQueryTotal = mysqli_query($conn, $consultaTotal);
$rowTotal = mysqli_fetch_assoc($getQueryTotal);
$totalItems = $rowTotal['total'];

// cantidad de paginas
$totalPages = ceil($totalItems / $limit);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tabla alumnos</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css">
    </style>
</head>

<body>
    <div>
        <h1>Ver alumnos</h1>
    </div>
    <div>
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Buscar" value="<?php echo $search ?>">
            <input type="submit" value="Buscar">
        </form>
    </div>
    <div class="table-alumnos">
        <table class="tabla-alumnos" border="1">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Año</th>
                    <th>Orientacion</th>
                    <th>Detalles</th>
                    <!-- <th>Eliminar</th> -->
                </tr>
            </thead>
            <tbody>
                <?php while ($rowSql = mysqli_fetch_assoc($getQueryPaginacion)) { ?>
                    <tr>
                        <td><?php echo $rowSql['DNI']; ?></td>
                        <td><?php echo $rowSql['apellidos']; ?></td>
                        <td><?php echo $rowSql['nombres']; ?></td>
                        <td><?php echo $rowSql['anio'] . '°'; ?></td>
                        <td><?php echo $rowSql['orientacion']; ?></td>
                        <td><a href="../pages/alumno.php?idalumno=<?php echo $rowSql["idAlumno"]; ?>" class="a-detalles">Detalles</a></td>
                        <!-- <td><a href="../php/eliminar-alumno.php?idalumno=<?php echo $rowSql["idAlumno"]; ?>" class="a-eliminar">Eliminar</a></td> -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <?php if ($page > 1) { ?>
            <a href="?page=<?php echo ($page - 1); ?>">Previous</a>
        <?php } ?>

        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <a href="?page=<?php echo $i; ?>" <?php if ($i == $page) {
                                                    echo 'class="active"';
                                                } ?>><?php echo $i; ?></a>
        <?php } ?>

        <?php if ($page < $totalPages) { ?>
            <a href="?page=<?php echo ($page + 1); ?>">Next</a>
        <?php } ?>
    </div>
    <a href="../../index.html" class="volver-a">Volver</a>

</body>

</html>

<?php
mysqli_close($conn);

?>