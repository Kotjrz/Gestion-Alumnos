<?php

$token = $_GET['token'];
$query = "SELECT * FROM sesiones WHERE token = '$token'";
$result = mysqli_query($conn, $query);
$result = $consulta->fetch_assoc();

if (!isset($_SESSION['tiempo'])) {
    $_SESSION['tiempo']=time();
}
else if (time() - $_SESSION['tiempo'] > 3600) {
    $query = "DELETE FROM sesiones WHERE token = '$token'";
    die();  
}
$_SESSION['tiempo']=time();

?>