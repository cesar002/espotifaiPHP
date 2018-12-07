<?php
namespace database\querys;

// include '../database/models/UserModel.php';

use database\models\UserModel;

class UserQuery{

    public static function crearUser($email, $pass) {
        return "INSERT INTO usuarios(email, PASSWORD) VALUES('$user','$pass')";
    }

    public static function actualizarDatos(UserModel $user) {

    }

    public static function agregarFavorito($id_cancion) {

    }

}