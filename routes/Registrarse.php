<?php

spl_autoload_register(function ($class){
    $data = "../" .str_replace('\\', '/', $class).".php";
    if(file_exists("../" .str_replace('\\', '/', $class).".php")){
        include_once("../" .str_replace('\\', '/', $class).".php");
    }
});

 use controllers\UserController;
 use database\models\UserModel;

 $tipoMethod = $_SERVER["REQUEST_METHOD"];

 if($tipoMethod == "POST"){
    $usuario = new UserModel();
    $usuario->setEmail($_POST["email"]);
    $usuario->setPass($_POST["password"]);

    $controller = new UserController();

    if( $controller->registrarUsuario($usuario) ){
        header('Location: ../successPage/registrado.html');
    }else{
        header('Location: ../errorsPage/errorRegistro.html');
    }

 }else{
     header('Location: ../errorsPage/error404.html');
 }
