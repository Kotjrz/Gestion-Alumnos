<?php

include '../php/lib/conn.php';

if(isset($_GET['ID_curso'])){
    $id = $_GET['ID_curso'];
    $query = "SELECT * from `curso` WHERE `ID_curso` = $id ";
    $result = mysqli_query($conn, $query);
   if(!$result){
     die("query fallida". mysqli_error($conn));
   }else{
     $row = mysqli_fetch_assoc($result);
   }
   
   }

   if (!empty($_GET["ID_curso"])) {
    $id = $_GET["ID_curso"];
    
    // Delete records from curso_alumnos table
    $deleteCursoAlumnos = $conn->query("DELETE FROM curso_alumnos WHERE Curso_CA = $id");
    
    // Delete records from materia table
    $deleteMateria = $conn->query("DELETE FROM materia WHERE curso = $id");
    
    // Delete the course from the curso table
    $deleteCurso = $conn->query("DELETE FROM curso WHERE ID_curso = $id");
    
    if ($deleteCursoAlumnos && $deleteMateria && $deleteCurso) {
        // All delete operations were successful
        echo "Curso y registros relacionados eliminados correctamente.";
    } else {
        // Handle errors if any of the delete operations failed
        echo "No se pudo eliminar el curso y registros relacionados.";
    }
    
    echo '<a href="../pages/index-tabla-curso.php">Volver</a>';
}
 
?>