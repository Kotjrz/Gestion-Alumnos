<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h1>Crear Cuenta</h1>
        <form>
            <div class="form-group">
                <label for="name">DNI:</label>
                <input type="text" class="form-control" id="DNI" name="DNI" placeholder="Ingrese su DNI">
            </div>


            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese una contraseña">
            </div>

            <div class="form-group">
                <label for="password2">Confierme su contraseña:</label>
                <input type="password" class="form-control" name="password2" id="password2" placeholder="Repita su contrsaeña">
                <a href="signup.html" class="btn btn-link mt-3 text-decoration-none">Iniciar sesión</a>
            </div>

            <button type="submit" class="btn btn-primary">Crear cuenta</button>
        </form>
    </div>

</body>

</html>
<?php
include("../php/lib/conn.php");

if(isset($_POST['DNI'])) {
    $DNI = mysqli_real_escape_string($conn, md5($_POST['DNI']));
  }
  if(isset($_POST['password'])) {
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
  }
  if(isset($_POST['password2'])) {
    $rePassword = mysqli_real_escape_string($conn, md5($_POST['password2']));
  }

//Validar que el DNI no este en uso
$sql = "SELECT usuario FROM cuenta WHERE usuario = '$DNI'";
$verDNI = mysqli_query($conn, $sql);

if(mysqli_num_rows($verDNI) >= 1)
{
    echo '<div class="callout callout-danger">
    <h4>Error.</h4>
    <p>DNI ya vinculado a una cuenta. Intente nuevamente</p>
    </div>';
} else{
    if(strcmp($password, $rePassword) != 0)
    {
        echo '<div class="callout callout-danger">
        <h4>Error.</h4>
        <p>Las contraseñas no son iguales. Intente nuevamente</p>
        </div>';
    }
    else
    {
        $insertar = "INSERT INTO cuenta (usuraio, contrasena, rol) VALUES ('$DNI', '$password', 'Alumno')";
        if($insertar)
        {
            echo '<div class="callout callout-success">
            <h4>Success.</h4>
            <p>Cuenta creada con exito.</p>
            </div>';  
        }else
        {
            echo '<div class="callout callout-danger">
            <h4>Error.</h4>
            <p>La cuenta no pudo ser creada. Intente nuevamente.</p>
            </div>'; 
        }
        header("Refresh:2; url=login.php");
    }
}

?>