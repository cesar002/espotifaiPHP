<?php
namespace database;

class DatabaseData {
    private $user = "root";
    private $pass = "";
    private $dbname = "espotifai";
    private $host = "localhost";

    public static function getUser() {
        return self::user;
    }

    public static function getPass() {
        return self::pass;
    }

    public static function getDBName() {
        return self::dbname;
    }

    public static function getHost() {
        return self::host;
    }

}