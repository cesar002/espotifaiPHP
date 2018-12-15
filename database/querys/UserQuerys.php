<?php
namespace database\querys;

use database\models\UserModel;

class UserQuerys{

    public static function crearUser($email, $pass) {
        return "INSERT INTO usuarios(email, PASSWORD) VALUES('$email','$pass')";
    }

    public static function getIdUsuarioByIdToken($token){
        return "SELECT us.* FROM usuarios AS us INNER JOIN token_registro AS tr ON us.id_user = tr.id_usuario
                WHERE tr.id_token = '$token'";
    }

    public static function activarUsuario($idUsuario){
        return "UPDATE usuarios SET verificado = 1 WHERE id_user = $idUsuario";
    }

    public static function getUsuarioByEmail($email){
        return "SELECT id_user, email, verificado FROM usuarios WHERE email = '$email'";
    }

    public static function actualizarDatos(UserModel $user) {

    }

    public static function agregarFavorito($id_cancion) {

    }

}