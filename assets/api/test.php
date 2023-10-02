<?php

include("../php/lib/conn.php");

$query = "SELECT COUNT(idAlumno) FROM `alumnos`";
$result = $conn->query($query);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo '{"cantidad":'.$row["COUNT(idAlumno)"].'}';
    }
}



?>