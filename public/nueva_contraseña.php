<?php

    include_once '../middelware/Login.php';
    use middelware\Login;

    if(Login::isLogin()){
        header("Location: ../public/index.php");
    }

    if(!isset($_GET["token"])){
        header("Location: ../public/index.php");
    }

    $token = $_GET["token"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include_once '../templates/BootstrapLinks.php'; ?>

    <title>Nueva contraseña</title>
</head>
<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-6 col-md-5 col-sm-5 mt-5 mx-auto">
                <div class="card shadow-lg" >
                    <div class="card-tittle border-bottom text-center" >
                        <h3>Ingresa una nueva contraseña</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <div class="form-group col-lg-11 mx-auto">
                                <label for="password"><h5>Nueva contraseña: </h5></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="nueva contraseña">
                            </div>
                            <div class="form-group col-lg-11 mx-auto">
                                <label for="re_password"><h5>Repita la contraseña: </h5></label>
                                <input type="password" class="form-control" id="re_password" name="re_password" placeholder="repite la nueva contraseña">
                            </div>
                            <input type="hidden" name="token" value= "<?php echo($token); ?>" >
                            <div class="form-group col-lg-11 mx-auto">
                                <button type="button" class="btn btn-success btn-lg btn-block">Cambiar contraseña</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>