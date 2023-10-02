<?php

include '../php/lib/conn.php';

$materia = $_POST["materia"];
$instancias = array("1era", "2nda", "3era", "4ta");


for ($i = 0; $i < count($instancias); $i++) {
    $consulta = "INSERT INTO `indicadores`(`materia`, `instancia`, `ind1`, `ind2`,`ind3`, `ind4`, `ind5`, `ind6`, `ind7`, `ind8`, `ind9`, `ind10`, `ind11`, `ind12`)
    VALUES ('$materia','$instancias[$i]'";
    
    for ($j = 1; $j <= 12; $j++) {
        $campo = "ind_" . $j . "_" . strtolower($instancias[$i]);
        if (isset($_POST[$campo])) {
        $consulta .= ",'" . $_POST[$campo] . "'";
        } else {
        $consulta .= ", NULL";  // Usar NULL para campos vacíos
        }
    }

    $consulta .= ")";

    $realizar = mysqli_query($conn, $consulta);
}
header("Location: ../../index.html");
?>