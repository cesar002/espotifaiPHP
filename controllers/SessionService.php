<?php
namespace controllers;

include_once '../database/models/UserModel.php';
include_once '../database/models/DatosUsuarioModel.php';

use database\models\UserModel;
use database\models\DatosUsuarioModel;


class SessionController{

    public static function Login(UserModel $user, DatosUsuarioModel $datos) {
        session_start();
        $_SESSION["user"] = [
            "id_user" => $user->getId_user(),
            "email" => $user->getEmail(),
            "datos" => [
                "username" => $datos->getUsername(),
                "nombre" => $datos->getNombre(),
                "apellido" => $datos->getApellido(),
                "edad" => $datos->getEdad(),
            ],
        ];
        
    }

    public static function Logout() {
        session_destroy();
    }

}