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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="./assets/css/index.css">
    <title>Espotifai</title>
</head>
<body>
    <div class="container-fluid portada">
        <!-- <div class="background "></div> -->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 max-auto">
                <div class="my-5 px-5">
                    <h1 class="text-center display-4" style="color:currentColor">Escucha toda la musica que quieras y gratis</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto mt-1">
                <div class="card shadow-lg">
                    <div class="card-tittle border-bottom text-center" >
                        <h1>Espotifai</h1>
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group col-lg-11 mx-auto">
                                <label for="emailuser"><h5>Correo:</h5></label>
                                <input class="form-control" type="email" name="email" id="emailuser" placeholder="email">
                            </div>
                            <div class="form-group col-lg-11 mx-auto">
                                <label for="pass"><h5>Contraseña:</h5></label>
                                <input class="form-control" type="password" name="password" id="pass" placeholder="password">
                            </div>
                            <!-- <div class="form-group col-lg-11 mx-auto text-center">
                                <small class><a href="#">¿olvidaste tu contraseña?</a></small>
                            </div> -->
                            <div class="form-group col-lg-11 mx-auto text-center mb-3">
                                <small class><a href="#">¿olvidaste tu contraseña?</a></small><br>
                                <small class="text-muted">¿aun no te haz registrado? <a href="">¡ven y registrate!</a></small>
                            </div>
                            <div class="form-group col-lg-11 mx-auto">
                                <button type="submit" class="btn btn-success btn-lg btn-block">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>