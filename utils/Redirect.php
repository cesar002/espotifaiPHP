<?php
namespace utils;

class Redirect{
    public static function redirectTo($url){
        header("Location: ".$url);
    }
}