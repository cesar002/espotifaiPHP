<?php
// include '../controllers/UserController.php';
// include '../database/models/UserModel.php';
// include '../database/querys/UserQuerys.php';
// include '../utils/PasswordUtils.php';
// include '../controllers/TokensRegistroService.php';

spl_autoload_register(function ($class){
    $data = "../" .str_replace('\\', '/', $class).".php";
    if(file_exists("../" .str_replace('\\', '/', $class).".php")){
        include_once("../" .str_replace('\\', '/', $class).".php");
    }
});

use utils\EmailSend;

EmailSend::sendEmailToken("soul.unleashed13@gmail.com", "asdasdasdasdasd");

// use controllers\UserController;
// use database\models\UserModel;

// $usuario = new UserModel();

// $usuario->setEmail("soul.unleashed13@gmail.com");
// $usuario->setPass("unodostres");

// $controller = new UserController();

// $controller->registrarUsuario($usuario);