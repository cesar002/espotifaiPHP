<?php
namespace database\querys;

class TokenRegistroQuery {

    public static function buscarToken($token){
        return "SELECT id_token, fecha_expiracion, usado FROM token_registro WHERE id_token = '$token'";
    }

    public static function crearToken($token, $idUser, $fechaLimite){
        $currentDate = date("Y-m-d");
        return "INSERT INTO token_registro(id_token, id_usuario, fecha_creacion, fecha_expiracion) VALUES ('$token','$idUser','$currentDate','$fechaLimite')";
    }

    public static function ponerTokenComoUsado($token){
        return "UPDATE token_registro SET usado = 1 WHERE id_token = '$token'";
    }

}