<?php

include("lib/conn.php");


$stmt = $conn->prepare("INSERT INTO alumnos ('apellidos', 'nombres', 'fechDeNacimiento', 'DNI', 'CUIL', 'CPI', 'documentoExtranjero', 'tipoDocumento', 'DNIe', 'idenGenero', 'nacionalidad', 'provincia', 'distrito', 'localidad', 'otra', 'direccion', 'piso', 'torre', 'depto', 'entre', 'yEntre', 'otroDato', 'provDomicilio', 'distriDomicilio','localiDomicilio' 'telefonoFIjo', 'telefonoCelular','cantHermanos', 'hermEscuela') VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


$stmt->bind_param("sssssssssssssssssssssssssssss", $apellidos, $nombres, $FechaDeNacimiento, $DNI, $CUIL, $CPI, $documentoExtranjero, $tipoDocumento, $DNIe, $idenGenero, $nacionalidad, $provincia, $distrito, $localidad, $otra, $direccion, $piso, $torre, $depto, $entre, $yEntre, $otroDato, $provDomicilio, $distriDomicilio, $loacliDomicilio, $telefonoFijo, $telefonoCelular, $cantHermanos, $hermEscuela,);

$apellidos = $_POST["apellido"];
$nombres = $_POST["nombre"];
$FechaDeNacimiento = $_POST["fecha-de-nacimiento"];
$DNI = $_POST["dni"];
$CUIL = $_POST["cuil"];
$CPI = $_POST["CPI"];
$documentoExtranjero = $_POST["extranjero"];
$tipoDocumento = $_POST["tipo-doc"];
$DNIe = $_POST["dnie"];
$idenGenero = $_POST["genero"];
$nacionalidad = $_POST["nacionalidad"];
$provincia = $_POST["arg-prov"];
$distrito = $_POST["distrito"];
$localidad = $_POST["localidad"];
$otra = $_POST["otra"];
$direccion = $_POST["domicilio"];
$piso = $_POST["piso"];
$torre = $_POST["torre"];
$depto = $_POST["depto"];
$entre = $_POST["entre"];
$yEntre = $_POST["calle"];
$otroDato = $_POST["extra"];
$provDomicilio = $_POST["provinciad"];
$distriDomicilio = $_POST["distritod"];
$loacliDomicilio = $_POST["localidadD"];
$telefonoFijo = $_POST["telefono"];
$telefonoCelular = $_POST["celular"];
$cantHermanos = $_POST["herm"];
$hermEscuela = $_POST["cantEscuela"];

$stmt->execute();

header("Location: ../../index.html");

$stmt->close();
$conn->close();
?>
