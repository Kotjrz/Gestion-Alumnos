<?php
$user = "root";
$pass = "";
$host = "localhost";
$datab = "gda";

$conn = new mysqli($host,$user,$pass,$datab);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>