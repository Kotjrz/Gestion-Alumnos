<?php
if (!empty($_GET["idDocente"])) {
    $id = $_GET["idDocente"];
    $sql=$conn->query("DELETE from profesores WHERE idDocente = $id");
    
}
?>