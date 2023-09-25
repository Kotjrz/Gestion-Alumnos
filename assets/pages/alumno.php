<?php
// Incluye el archivo de conexión a la base de datos.
include("../php/lib/conn.php");

// Obtiene el ID del alumno desde la URL usando el método GET.
$id_alumno = $_GET['idalumno'];

// Prepara una consulta SQL utilizando una sentencia preparada para evitar inyecciones SQL.
$stmt = $conn->prepare("SELECT * FROM alumnos WHERE idAlumno = ?");
$stmt->bind_param("i", $id_alumno); // "i" indica que se espera un valor entero.
$stmt->execute(); // Ejecuta la consulta preparada.
$result = $stmt->get_result(); // Obtiene el resultado de la consulta.

// Verifica si la consulta devolvió al menos una fila de resultados.
if ($result->num_rows > 0) {
    // Si hay resultados, obtiene la primera fila de resultados.
    $row = $result->fetch_assoc();

    $columnNames = array_keys($row);

    $newColumnNames = [
        'fechaDeNacimiento' => 'Fecha de nacimiento',
        'tipoDoc' => 'Tipo de documento',
        'idenGenero' => 'Identidad de Genero',
        'otroDato' => 'Dato adicional',
        'provincia' => 'Provincia de nacimiento',
        'distrito' => 'Distrito de nacimiento',
        'localidad' => 'Localidad de nacimiento',
        'provDomicilio' => 'Provincia de domicilio actual',
        'distriDomicilio' => 'Distrito de domicilio actual',
        'localiDomicilio' => 'Localidad de domicilio actual',
        'telefonoFijo' => 'Telefono fijo',
        'telefonoCelular' => 'Telefono celular',
        'cantHermanos' => 'Cantidad de hermanos',
        'hermEscuela' => 'Cantidad de hermanos en la escuela'
    ];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alumno</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <?php
        // Muestra los nombres de las columnas de la tabla.
        foreach ($columnNames as $columnName) {

            if (isset($newColumnNames[$columnName])) {
                $newColumnName = $newColumnNames[$columnName];
            } else {
                $newColumnName = $columnName;
            }

            echo '<h4>' . strtoupper($newColumnName) . '</h4>' . $row[$columnName] . '<br>';
            echo '<a href="../php/editar-alumno.php?column=' . $columnName . '&idalumno=' . $id_alumno . ' ">Edit</a><br>';
        }

        ?>
        <!-- Agrega un enlace para volver a la página de tabla de alumnos. -->
        <a href="../pages/tabla-alumnos.php">Volver</a>
    </body>

    </html>

<?php
} else {
    // Si no se encontraron resultados, muestra un mensaje de error.
    echo "No se encontró ningún alumno con el ID proporcionado.";
}

// Cierra la sentencia preparada y la conexión a la base de datos.
$stmt->close();
$conn->close();
?>