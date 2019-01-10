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
    $usuario->setPass($_POST["pass"]);

    $controller = new UserController();

    if($usuario->getPass() == "" || $usuario->getEmail() == ""){
        header("Location: ../public/registro.php");
    }

    $status = $controller->registrarUsuario($usuario);

    if( $status == true ){
        header('Location: ../successPage/registrado.html');
    }else{
        header('Location: ../errorsPage/errorRegistro.html');
    }

 }else{
     header('Location: ../errorsPage/error404.html');
 }
