<?php
namespace utils;

class TokenGenerator{

    public static function generateOpenSSLToken($size_token){
        $token = openssl_random_pseudo_bytes($size_token);
        return bin2hex($token);
    }

    public static function generateRandomBytesToken($size_token){
        return bin2hex(random_bytes($size_token));
    }

}