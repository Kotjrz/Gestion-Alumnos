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

    // Obtiene el ID del alumno y la columna desde el formulario.
    $id_alumno = isset($_POST['idalumno']) ? $_POST['idalumno'] : null;
    $column = isset($_POST['column']) ? $_POST['column'] : null;

    try {
        // Verifica si se proporcionaron valores válidos.
        if ($id_alumno !== null && $column !== null) {
            // Obtiene el nuevo valor desde el formulario.
            $new_value = isset($_POST['new_value']) ? $_POST['new_value'] : null;

            // Verifica si se proporcionó un nuevo valor.
            if ($new_value !== null) {
                // Prepara una consulta SQL utilizando una sentencia preparada para actualizar el campo seleccionado.
                $stmt = $conn->prepare("UPDATE alumnos SET $column = ? WHERE idAlumno = ?");
                $stmt->bind_param("si", $new_value, $id_alumno); // "si" indica que se espera un valor string y un valor entero.

                // Ejecuta la consulta preparada.
                if ($stmt->execute()) {
                    echo "Campo actualizado correctamente.";
                } else {
                    echo "Error al actualizar el campo.";
                }

                // Cierra la sentencia preparada.
                $stmt->close();
            } else {
                echo "No se proporcionó un nuevo valor.";
            }
        } else {
            echo "No se proporcionó un ID de alumno o una columna válida.";
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
