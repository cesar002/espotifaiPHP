<?php
namespace database\querys;

class LoginQuery {

    public static function loginQuery($email){
        return "SELECT id_user, email, password, verificado FROM usuarios WHERE email = '$email'";
    }

}