<?php
    include_once '../middelware/Login.php';
    use middelware\Login;

    if(!Login::isLogin()){
        header ('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include '../templates/BootstrapLinks.php'; ?>

    <title>Espotifai</title>
</head>
<body>
    <?php include '../templates/NavBar.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-md-11 col-sm-9 mx-auto mt-5 ">
                <form>
                    <div class="form-row">
                        <div class="form-group col-lg-9 col-md-8">
                            <input type="text" class="form-control" name="cancion" id="cancion" placeholder = "Buscar...">
                        </div>
                        <div class="form-group col-lg-3 col-md-4" >
                            <button type="submit" class="form-control btn btn-success rounded-10">Buscar Musica</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>