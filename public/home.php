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
            <div class="col-lg-6 col-md-6 col-sm-6">
                <form class="form-inline">
                    <div class="form-group">
                        <input type="text" name="cancion" id="cancion" placeholder = "Buscar...">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success rounded-10">Buscar Musica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>