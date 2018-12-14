<?php
include '../utils/LoadFiles.php';

autoLoad();

use middelware\Login;
use controllers\UserController;

if(!Login::isLogin()){

    $typeMethod = $_SERVER["REQUEST_METHOD"];

    if($typeMethod == "GET"){
        $userControl = new UserController();
        
        if(isset($_GET["token"])){
            if($userControl->verificarUsuario($_GET["token"])){
                //redirigimos a una pagina que diga que ya puede iniciar sesion el bato
                echo "Se ha validado su usuario, ahora puede iniciar sesión";
            }else{
                echo "error al validar el usuario";
            }
        }

    }


}

