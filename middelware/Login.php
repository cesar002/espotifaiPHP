<?php
namespace middelware;

class Login{

    public static function isLogin(){
        session_start();

        if(!isset($_SESSION["user"])){
            return false;
        }

        return true;
    }

}