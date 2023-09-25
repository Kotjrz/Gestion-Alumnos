<?php
// Incluye el archivo de conexión a la base de datos.
include("../php/lib/conn.php");

// Obtiene el ID del alumno desde la URL usando el método GET.
$id_alumno = isset($_GET['idalumno']) ? $_GET['idalumno'] : null;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores actualizados del formulario
    $column = $_POST['column'];
    $value = $_POST['new_value'];

    print_r($_POST);

    try {
        // Prepara una consulta SQL utilizando una sentencia preparada
        $stmt = $conn->prepare("UPDATE alumnos SET $column = ? WHERE idAlumno = ?");
        $stmt->bind_param("ss", $column, $value);; // "si" indica que se espera un valor string y un valor entero.
        $stmt->execute(); // Ejecuta la consulta preparada.

        // Verifica si se actualizó al menos una fila.
        if ($stmt->affected_rows > 0) {
            echo "Registro actualizado correctamente.";
        } else {
            echo "No se encontró ningún registro para actualizar.";
        }

        // Cierra la sentencia preparada.
        $stmt->close();
    } catch (Exception $e) {
        // Muestra un mensaje de error detallado en caso de excepción.
        echo "Error: " . $e->getMessage();
    }
}

// Cierra la conexión a la base de datos.
$conn->close();
?>