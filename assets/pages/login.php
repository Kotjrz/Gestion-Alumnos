<?php include("../php/lib/conn.php");

$DNI

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h1 class="text-center">Login</h1>
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="DNI" name="DNI" placeholder="Ingrese su DNI">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
                        <a href="signup.html" class="btn btn-link mt-3 text-decoration-none" >Crear cuenta alumno</a>
                    </div>
                    <button type="submit" class="btn btn-primary ">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>