<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include '../templates/BootstrapLinks.php'; ?>

    <link rel="stylesheet" href="./assets/css/registro.css">
    <link rel="stylesheet" href="./assets/css/daterangepicker.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/material-design-iconic-font.min.css">

    <script src="./assets/js/select2.min.js"></script>
    <script src="./assets/js/daterangepicker.js"></script>
    <script src="./assets/js/registro.js"></script>
    
    <title>Registrate</title>
</head>
<body>
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registrate!!</h2>
                    <form method="POST" action="#" id="registro">
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                        </div>
                        <div class = "email-error" id = "email-error">
                            <small style="color: red; font-size: 13px;">*Email incorrecto</small>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="contraseña" name="pass">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="repite la contraseña" name="passre">
                        </div>
                        <div class="pass-error" id = "pass-error">
                            <small style="color: red; font-size: 13px;">*las contraseñas son incorrectas</small>
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="button" onClick="validarPass()">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>