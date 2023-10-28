<?php 

function checkToken(string $token) : array | bool | null{
    include("conn.php");

    $query = "SELECT * FROM sesiones WHERE token = '$token'";
    $consulta = mysqli_query($conn, $query);
    $result = $consulta->fetch_assoc();
    return $result;
}

function getCuenta(string $idCuenta) : array | bool | null{
    include("conn.php");

    $query = "SELECT * from Cuenta where idCuenta = '$idCuenta'";
    $consulta = mysqli_query($conn, $query);
    $result = $consulta->fetch_assoc();
    return $result;
}

function getInfo(array $sesion) : array | bool{
    include("conn.php");

    $idCuenta = $sesion["idCuenta"];

    $result = getCuenta($idCuenta);

    if (!$result){
        return false;
    }

    $rol = $result["rol"];

    if ($rol == "Alumno"){
        $query = "select * from alumnos where idCuenta = '$idCuenta'";
        $consulta = mysqli_query($conn, $query);
        $result = $consulta->fetch_assoc();
        if (!$result){
            return false;
        }
        return $result;
    } else if($rol == "Docente"){
        $query = "select * from profesores where idCuenta = '$idCuenta'";
        $consulta = mysqli_query($conn, $query);
        $result = $consulta->fetch_assoc();
        if (!$result){
            return false;
        }
        return $result;
    }

    return false;
}

?>