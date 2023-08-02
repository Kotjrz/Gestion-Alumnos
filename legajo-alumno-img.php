<?php

function insertarimagen(){
    
    if(empty($_FILES[$Documento]["documento"]))
    return;
    
    if(empty($_FILES[$Act_nacimiento]["nacimiento"]))
    return;

    $file_name = $_FILES[$Documento]["documento"];
    $file_name1 = $_FILES[$Act_nacimiento]["nacimiento"];

    $extencion = pathinfo($_FILES[$Documento]["documento"], pathinfo_extension());
    $extencion1 = pathinfo($_FILES[$Act_nacimiento]["nacimiento"], pathinfo_extension());
    $formatos = array('png','gif','jpg','jpeg','pdf');

    if(!in_array(strtolower($extencion,$extencion1),$formatos))
    return;

    if($_FILES[$Documento]["size"] > 33000003008000)
    return;
    if($_FILES[$Act_nacimiento]["size"] > 33000003008000)
    return;

    $guardardir = "/gestion/img";

    @rmdir($guardardir);

    if(!file_exists($guardardir)){
        @mkdir($guardardir,007,true);
    }

    $token = md5(uniqid(rand(),true));
    $file_name = $token.'.' . $extencion;
    $file_name1 = $token.'.' . $extencion1;

    $add = $guardardir.$file_name;
    $db_url = "$file_name";

    $add = $guardardir.$file_name1;
    $db_url1 = "$file_name1";

    if(move_uploaded_file($_FILES[$Documento]["tmp_name"],$add)){
        $sql = "UPDATE 'legajo alumno' SET $Documento = $db_url WHERE 'Legajo' = $Legajo";
    }
    
    if(move_uploaded_file($_FILES[$Act_nacimiento]["tmp_name"],$add)){
        $sql = "UPDATE 'legajo alumno' SET $Act_nacimiento = $db_url1 WHERE 'Legajo' = $Legajo";
    }
}

?>