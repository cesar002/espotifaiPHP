<?php
namespace controllers;


class SessionService{

    public static function Login($id, $email) {
        try{
            session_start();
        }catch(\Exception $e){}
        catch(\Error $err){}

        $_SESSION["user"] = [
            "id_user" => $id,
            "email" => $email,
        ];
        
    }

    public static function Logout() {
        try{
            session_start();
        }catch(\Exception $e){}
        catch(\Error $err){}

        session_destroy();
    }

}