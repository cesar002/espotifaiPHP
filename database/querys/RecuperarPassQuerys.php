<?php

namespace database\querys;

class RecuperarPassQuerys {

    public static function registrarToken($id_user, $token, $expira){
        $currentDate = date('Y-m-d');
        return "INSERT INTO token_reset(id_token, id_usuario, fecha_creacion, fecha_expiracion) VALUES('$token', '$id_user', '$currentDate', '$expira')";
    }

    public static function activarToken($token){
        return "UPDATE token_reset SET usado = 1 WHERE id_token = '$token'";
    }

    public static function findTokenByIdToken($token){
        return "SELECT * FROM token_reset WHERE id_token = '$token'";
    }

    public static function getEmailByToken($token){
        return "SELECT us.email FROM token_reset AS tr INNER JOIN usuarios AS us ON tr.id_usuario = us.id_user AND tr.usado = 0 WHERE tr.id_token = '$token'";
    }

    public static function actualizarContraseña($pass, $email){
        return "UPDATE usuarios SET password = '$pass' WHERE email = '$email'";
    }

}