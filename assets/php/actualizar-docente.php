<?php
if (empty($_POST["btn-act"])) {
    if (!empty($_POST["Nombre"]) and !empty($_POST["Apellido"]) and !empty($_POST["nacionalidad"]) and !empty($_POST["DNI"]) and !empty($_POST["CUIL"]) and !empty($_POST["Edad"]) and !empty($_POST["Numero_de_telefono"]) and !empty($_POST["Numero_de_celular"]) and !empty($_POST["domicilio"]) and !empty($_POST["domicilio_piso"]) and !empty($_POST["domicilio_depto"]) and !empty($_POST["localidad"]) and !empty($_POST["partido"]) and !empty($_POST["Mail"]) and !empty($_POST["mailAbc"]) and !empty($_POST["Titulo"]) and !empty($_POST["legajo"])) {
        $nombre = $_POST["Nombre"];
        $apellidos = $_POST["Apellido"];
        $nacionalidad = $_POST["nacionalidad"];
        $DNI = $_POST["DNI"];
        $CUIL = $_POST["CUIL"];
        $fechanacimiento = $_POST["Fecha_de_nacimiento"];
        $Edad = $_POST["Edad"];
        $telefono = $_POST["Numero_de_telefono"];
        $celular = $_POST["Numero_de_celular"];
        $domicilio = $_POST["domicilio"];
        $depto = $_POST["domicilio_depto"];
        $piso = $_POST["domicilio_piso"];
        $localidad = $_POST["localidad"];
        $partido = $_POST["partido"];
        $mail = $_POST["Mail"];
        $mailabc = $_POST["mailAbc"];
        $titulo = $_POST["Titulo"];
        $legajo = $_POST["legajo"];
        $fechaingreso = $_POST["Fecha_de_ingreso"];
        $estado = $_POST["estado"];

        $sql = $conn->query("UPDATE profesores set Nombre ='$nombre' , Apellido = '$apellidos', nacionalidad = '$nacionalidad', DNI = '$DNI', cuil = '$CUIL', Edad = '$Edad', fechaDeNacimiento = '$fechanacimiento', numeroDeTelefono = '$telefono', numeroDeCelular = '$celular', domicilio = '$domicilio', domicilio_piso = '$piso', domicilio_depto = '$depto', localidad = '$localidad', partido = '$partido', Mail = '$mail' mailAbc = '$mailabc', Titulo = '$titulo, legajo = '$legajo' Fechadeingreso = '$fechaingreso',estado = '$estado'");
        if ($sql == 1) {
            header("location:index.html");
        } else {
            echo "Error al actualizar los datos"; #cambiar cuando se hagan los estilos 
        }
    } else {
        echo "campos vacios"; #cambiar cuando se hagan los estilos
    }
}
