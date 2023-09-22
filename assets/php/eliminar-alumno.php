<?php 
include("../php/lib/conn.php");

if (!empty($_GET["idalumno"])) {
    $id = $_GET["idalumno"];
    
    // Prepare the SQL statement with a placeholder for the ID parameter
    $stmt = $conn->prepare("DELETE FROM alumnos WHERE idAlumno = ?");
    
    // Bind the ID parameter to the placeholder
    $stmt->bind_param("i", $id);
    
    // Execute the prepared statement
    if ($stmt->execute()) {
        // The query was successful
        echo "Alumno deleted successfully.";
    } else {
        // The query failed
        echo "Error deleting alumno.";
    }
    
    // Close the prepared statement
    $stmt->close();
} else {
    echo "No ID provided.";
}

// Close the database connection
$conn->close();
?>

<script>
    setTimeout(function() {
        window.location.href = "../pages/tabla-alumnos.php";
    }, 2000);
</script>