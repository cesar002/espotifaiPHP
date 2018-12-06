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
        
    </div>
</body>
</html>