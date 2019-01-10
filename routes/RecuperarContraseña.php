<?php

include_once '../utils/LoadFiles.php';

autoLoad();

use middelware\Login;
use controllers\RecuperarPassController;

if(!Login::isLogin()){

    $typeMethod = $_SERVER["REQUEST_METHOD"];

    //generar el token
    if($typeMethod == "POST"){
        if(!isset($_POST["email"])){
            header("Location: ../public/recuperar_Contraseña.php");
            return;
        }

        if(RecuperarPassController::reSendEmailRecuperacion($_POST["email"])){
            header("Location: ../public/index.php");
        }else{
            header("Location: ../public/recuperar_Contraseña.php");
        }


    //validar el token
    }else if($typeMethod == "GET") {
        if(!isset($_GET["token"])){
            header("Location: ../public/index.php");
        }

        $token = $_GET["token"];

        if(RecuperarPassController::verificarCaducidadToken($token)){
            header("Location: ../public/nueva_contraseña.php?token=$token");
        }else{
            header("Location: ../public/index.php");
        }

    }

}