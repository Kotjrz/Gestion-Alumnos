<?php

$user = "root";
$pass = "";
$host = "localhost";
$datab = "gestion de alumnos";


$connection = mysqli_connect ($host,$user,$pass,$datab);


$Legajo = $_POST["legajo"];
$Nombre = $_POST["nombre"];
$Apellido = $_POST["apellido"];
$Foto_alumno = $_POST["foto_alumno"];
$DNI = $_POST["dni"];
$Entrada = $_POST["entrada"];
$Sexo = $_POST["sexo"];
$Genero = $_POST["genero"];
$Documento = $_POST["documento"];
$Act_nacimiento = $_POST["nacimiento"];
$Ficha_medica = $_POST["medica"];
$Cert_primaria = $_POST["cert_primaria"];
$Cert_alumno = $_POST["cert_alumno"];

if (!$connection){
    echo "No se a podido conectar al servidor" . mysqli_error();
}
else
{
    echo "<b><h3>Hemos conectado al servidor</h3></b>";
}

$db = mysqli_select_db($connection,$datab);

if (!$db)
{
    echo "No se a podido encontrar la tabla";
}
else
{
    echo "<h3>Tabla seleccionada: legajo alumnos</h3>";
}

if (isset($Documento)) {
    // Verifica si se ha enviado un formulario con el campo 'post' mediante el método POST.

    //$post = mysqli_real_escape_string($connection, $_POST["documento"]);
    // Escapa el valor del campo 'post' para prevenir ataques de inyección de SQL y lo guarda en la variable $post.

    //$rfoto = $_POST["documento"]["tmp_name"];
    // Obtiene la ruta temporal del archivo cargado mediante el formulario en el campo 'img' y la guarda en $rfoto.

    $topic = mysqli_real_escape_string($connection,$Documento);
    // Escapa el valor del campo 'topic' para prevenir ataques de inyección de SQL y lo guarda en $topic.

    if (is_uploaded_file($Documento)) {
        // Verifica si se ha subido un archivo mediante la función is_uploaded_file().

        $destino = "htdocs/gestion/archivos/";
        // Define la ruta de destino del archivo utilizando el nombre del archivo.

        if (!is_dir("archivos")) {
            mkdir("archivos", 007, true);
            // Crea un directorio "publicaciones" con permisos 007 si no existe.
        }

        if (move_uploaded_file($Documento, $destino)) {
            $nombre = $Documento;
            // Mueve el archivo subido a la ubicación de destino y guarda el nombre del archivo en $nombre.
        } else {
            $nombre = '';
            // Si no se puede mover el archivo, asigna una cadena vacía a $nombre.
        }
    } 
    else {
        $nombre = '';
        // Si no se ha subido un archivo, asigna una cadena vacía a $nombre.
    }
}
$instruction_sql = "INSERT INTO `legajo alumno`(`Legajo`, `Nombres`, `Apellido`, `Foto_Alumno`, `DNI`, `Sexo nacimiento`, `Identidad de género`, `Año de entrada`, `Fichas medicas`, `Partida de Nacimiento`, `Certificado pase de primaria`, `Certificado alumno regular`, `Documento Fotocopia`) 
VALUES ('$Legajo','$Nombre','$Apellido','$Foto_alumno','$DNI','$Sexo','$Genero','$Entrada','$Ficha_medica','$Act_nacimiento','$Cert_primaria','$Cert_alumno','$Documento')";



$resultado = mysqli_query ($connection,$instruction_sql);



echo '<a href="index-legajo-alumnos.html">Volver Atras<a/>';

?>
