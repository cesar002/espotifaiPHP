<?php
    include '../middelware/Login.php';
    include '../utils/Redirect.php';
    use middelware\Login;
    use utils\Redirect;

    if(Login::isLogin()){
        Redirect::redirectTo("./home.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once '../templates/BootstrapLinks.php';  ?>
    <title>Recuperar contraseña</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mt-3 mx-auto text-center">
                <h2>ingrese su correo para recuperar su contraseña</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-5 mt-5 mx-auto">
                <div class="mt-5">
                    <form action="../routes/RecuperarContraseña.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col-lg-9 col-md-8 col-sm-6">
                                <input type="email" class="form-control" name="email" placeholder="email">
                            </div>
                            <div class="form-group col-lg-3 col-md-4 col-sm-6">
                                <button type="submit" class="btn btn-primary">Recuperar contraseña</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>