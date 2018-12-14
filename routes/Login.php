<?php
include_once '../utils/LoadFiles.php';

autoLoad();

use middelware\Login;
use controllers\LoginController;


$typeMethod = $_SERVER["REQUEST_METHOD"];

if(!Login::isLogin()){
    if($typeMethod == "POST"){
        if(isset($_POST["email"]) && isset($_POST["password"])){
            if( LoginController::Login($_POST["email"], $_POST["password"]) ){
                header("../public/home.php");
            }else{
                header("Location: ../public/index.php");
            }
        }else{
            header("Location: ../public/index.php");
        }
    }else{
        header('Location: ../errorsPage/error404.html');
    }
}else{
    return;
}
