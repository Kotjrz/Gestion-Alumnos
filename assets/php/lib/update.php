<?php
include("../../php/lib/conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_GET['idalumno']) && isset($_POST['column']) && isset($_POST['value'])) {
        $IDalumno = $_GET['idalumno'];
        $columnName = $_POST['column'];
        $newValue = $_POST['value'];


        // Check if the connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute the SQL query to update the value for the specific student ID
        $query = "UPDATE alumnos SET $columnName = '$newValue' WHERE idAlumno = $IDalumnos";
        $result = mysqli_query($conn, $query);

        // Check if the update was successful
        if ($result) {
            echo 'Valor para la ' . $columnName . ' actualizado a: ' . $newValue;
        } else {
            echo 'Error: Error a actualizar.';
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo 'Error: IdAlumno, column name, or value not specified.';
    }
} else {
    echo 'Error: Form not submitted.';
}
?>