<?php
namespace controllers;

include '../database/models/UserModel.php';
use database\models\UserModel;

class SessionController{

    public static function Login(UserModel $user) {
        session_start();
        
    }

    public static function Logout() {
        session_destroy();
    }

}