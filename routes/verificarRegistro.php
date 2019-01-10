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
                header('Location: ../successPage/validado.html');
            }else{
               header('Location: ../errorsPage/errorValidacion.html');
            }
        }

    }


}

