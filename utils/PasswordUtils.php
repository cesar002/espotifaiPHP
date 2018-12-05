<?php 
namespace utils\PasswordUtils;

class PasswordUtils {
    
    public static function createHash($pass){
        return password_hash($pass, PASSWORD_BCRYPT);
    }

    public static function verify($pass, $hash){
        return password_verify($pass, $hash);
    }

}
