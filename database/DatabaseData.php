<?php
namespace database\DatabaseData;

class DatabaseData {
    private static $user = "root";
    private static $pass = "";
    private static $dbname = "espotifai_dev";   //"espotifai";
    private static $host = "localhost";

    public static function getUser() {
        return self::$user;
    }

    public static function getPass() {
        return self::$pass;
    }

    public static function getDBName() {
        return self::$dbname;
    }

    public static function getHost() {
        return self::$host;
    }

}