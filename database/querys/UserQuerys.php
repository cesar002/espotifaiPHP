<?php
namespace database\querys;

use database\models\UserModel;

class UserQuerys{

    public static function crearUser($email, $pass) {
        return "INSERT INTO usuarios(email, PASSWORD) VALUES('$email','$pass')";
    }

    public static function actualizarDatos(UserModel $user) {

    }

    public static function agregarFavorito($id_cancion) {

    }

}