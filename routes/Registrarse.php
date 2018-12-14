<?php

spl_autoload_register(function ($class){
    $data = "../" .str_replace('\\', '/', $class).".php";
    if(file_exists("../" .str_replace('\\', '/', $class).".php")){
        include_once("../" .str_replace('\\', '/', $class).".php");
    }
});

 use controllers\UserController;
 use database\models\UserModel;

 $usuario = new UserModel();

 $usuario->setEmail("soulunleashed_13@hotmail.com");
 $usuario->setPass("gundam000");

 $controller = new UserController();

 $controller->registrarUsuario($usuario);