<?php

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}


include('../php/lib/conn.php');

header("Content-Type: application/json");

$username = $_POST["usuario"];
mysqli_real_escape_string($conn, $username);


$password = $_POST["contra"];
mysqli_real_escape_string($conn, $password);

$return = ["result" => ""];

$query = $conn->query("SELECT * FROM `cuenta` WHERE usuario = '$username'");

$clientResult = $query->fetch_assoc();

if (!$clientResult || $clientResult["contrasena"] != $password) {
    $return["result"] = "error";
    die(json_encode($return["result"]));
}

while(true) {
    $token = generateRandomString($length = 15);
    $query = $conn->query("SELECT * FROM `sesiones` WHERE token = '$token'");
    if ($query->num_rows == 0){
        break;
    }
}

$clientid = $clientResult["idCuenta"];
$query = $conn->query("INSERT INTO `sesiones` (`token`, `idCuenta`, `creacion`) VALUES ('$token', '$clientid', NOW())");

$return["result"] = "ok";
$return["token"] = $token;
echo json_encode($return);
exit;
?>