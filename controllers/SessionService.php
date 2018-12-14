<?php
namespace controllers;


class SessionController{

    public static function Login($id, $email) {
        session_start();
        $_SESSION["user"] = [
            "id_user" => $id,
            "email" => $email,
        ];
        
    }

    public static function Logout() {
        session_destroy();
    }

}