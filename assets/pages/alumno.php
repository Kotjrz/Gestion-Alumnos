<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Campo</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="wrapper">
        <?php
        // Incluye el archivo de conexión a la base de datos.
        include("../php/lib/conn.php");

        // Obtiene el ID del alumno desde la URL usando el método GET.
        $id_alumno = $_GET['idalumno'];

        try {
            // Prepara una consulta SQL utilizando una sentencia preparada para evitar inyecciones SQL.
            $stmt = $conn->prepare("SELECT * FROM alumnos WHERE idAlumno = ?");
            $stmt->bind_param("i", $id_alumno); // "i" indica que se espera un valor entero.
            $stmt->execute(); // Ejecuta la consulta preparada.
            $result = $stmt->get_result(); // Obtiene el resultado de la consulta.

            // Verifica si la consulta devolvió al menos una fila de resultados.
            if ($result->num_rows > 0) {
                // Si hay resultados, obtiene la primera fila de resultados.
                $row = $result->fetch_assoc();

                // Define un mapeo de nombres de columnas a nombres más legibles.
                $columnNamesMap = [
                    'fechaDeNacimiento' => 'Fecha de nacimiento',
                    'tipoDoc' => 'Tipo de documento',
                    'numeroDoc' => 'Número de documento',
                    'nombre' => 'Nombre',
                    'apellido' => 'Apellido',
                    'direccion' => 'Dirección actual',
                    'telefono' => 'Teléfono',
                    'documentoExtranjero' => 'Documento Extrajero',
                    'idenGenero' => 'Identidad de Genero',
                    'telefonoFijo' => 'Teléfono Fijo',
                    'telefonoCelular' => 'Teléfono Celular',
                    'cantHermanos' => 'Cantidad de hermanos',
                    'hermEscuela' => 'Hermanos en la escuela',
                    'provDomicilio' => 'Provincia de domicilio actual',
                    'provincia' => 'Provincia de nacimiento',
                    'nacionalidad' => 'Nacionalidad',
                    'DNIe' => 'DNI Extrajero',
                    'distriDomicilio' => 'Distrito de domicilio actual',
                    'localiDomicilio' => 'Localidad de domicilio actual',
                    'distrito' => 'Distrito de nacimiento',
                    'localidad' => 'Localidad de nacimiento',
                ];

                // Muestra los datos del estudiante.
                echo '<h2>Datos del Estudiante</h2>';

        ?>

                <div>

                    <?php

                    foreach ($row as $columnName => $value) {
                        // Verifica si hay un nombre de columna legible en el mapeo.
                        $displayColumnName = isset($columnNamesMap[$columnName]) ? $columnNamesMap[$columnName] : $columnName;



                        // Muestra la información del estudiante.
                        echo '<p><strong>' . $displayColumnName . ':</strong> ' . $value . '</p>';
                    }
                    ?>

                </div>

        <?php

                // Agrega un enlace para editar cada campo individualmente.
                echo '<h2>Editar Campos</h2>';

                foreach ($row as $columnName => $value) {
                    $editLink = '../php/editar-campo.php?column=' . $columnName . '&idalumno=' . $id_alumno;
                    $displayColumnName = isset($columnNamesMap[$columnName]) ? $columnNamesMap[$columnName] : $columnName;
                    echo '<p><a href="' . $editLink . '">Editar ' . $displayColumnName . '</a></p>';
                }

                // Agrega un enlace para volver a la página de tabla de alumnos.
                echo '<p><a href="../pages/tabla-alumnos.php">Volver</a></p>';
            } else {
                // Si no se encontraron resultados, muestra un mensaje de error.
                echo "No se encontró ningún alumno con el ID proporcionado.";
            }

            // Cierra la sentencia preparada y la conexión a la base de datos.
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            // Muestra un mensaje de error detallado en caso de excepción.
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>
</body>

</html>