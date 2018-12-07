<?php
include '../middelware/Login.php';
include '../controllers/TokensRegistroController.php';
use middelware\Login;
use controllers\TokenRegistroController;

if(!Login::isLogin()){

    $typeMethod = $_SERVER["REQUEST_METHOD"];

    if($typeMethod == "GET"){
        $tokenControl = new TokenRegistroController();
        
        if(isset($_GET["token"])){
            if($tokenControl->verificaryUsarToken($_GET["token"], $currentDate)){
                //redirigimos a una pagina que diga que ya puede iniciar sesion el bato
                header('algo');
            }
        }

    }


}

