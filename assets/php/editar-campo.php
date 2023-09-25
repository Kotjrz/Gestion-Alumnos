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
    $id_alumno = isset($_GET['idalumno']) ? $_GET['idalumno'] : null;


    try {
        // Verifica si se ha seleccionado una columna para editar.
        if (isset($_GET['column'])) {
            $column = $_GET['column'];

            // Prepara una consulta SQL utilizando una sentencia preparada para obtener el valor actual del campo seleccionado.
            $stmt = $conn->prepare("SELECT $column FROM alumnos WHERE idAlumno = ?");
            $stmt->bind_param("i", $id_alumno); // "i" indica que se espera un valor entero.
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Verifica si se encontró el registro y la columna seleccionada.
            if ($result->num_rows > 0) {
                // Obtiene el valor actual del campo seleccionado.
                $row = $result->fetch_assoc();
                $currentValue = $row[$column];

                // Muestra el formulario para editar el campo seleccionado.
                echo '<h2>Editar ' . $column . '</h2>';
                echo '<form method="POST" action="../php/edit-alumno.php">';
                echo '<input type="hidden" name="column" value="' . $column . '">';
                echo '<input type="hidden" name="idalumno" value="' . $id_alumno . '">';
                echo '<label for="new_value">Nuevo Valor:</label>';
                echo '<input type="text" id="new_value" name="new_value" value="' . $currentValue . '" required>';
                echo '<button type="submit">Guardar</button>';
                echo '</form>';
            } else {
                echo "No se encontró ningún alumno con el ID proporcionado o la columna seleccionada.";
            }

            // Cierra la sentencia preparada.
            $stmt->close();
        } else {
            echo "No se ha seleccionado una columna para editar.";
        }

        // Agrega un enlace para volver a la página de detalles del alumno.
        echo '<p><a href="../pages/alumno.php?idalumno=' . $id_alumno . '">Volver a Detalles</a></p>';
        
        // Cierra la conexión a la base de datos.
        $conn->close();
    } catch (Exception $e) {
        // Muestra un mensaje de error detallado en caso de excepción.
        echo "Error: " . $e->getMessage();
    }
    ?>
    </div>
</body>
</html>
