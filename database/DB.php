<?php

namespace database;

include_once 'DatabaseData.php';

use database\DatabaseData\DatabaseData;

class DB {
    private static $connector;

    public static function conectar(){
        self::$connector = new \PDO("mysql:dbname=".DatabaseData::getDBName()."; host = ".DatabaseData::getHost(), DatabaseData::getUser(), DatabaseData::getPass());
    }

    public static function insert($query){
        self::$connector->exec($query);
        return self::$connector->lastInsertId();
    }

    public static function insert_value_boolean($query){
        try{
            self::$connector->exec($query);
            return true;
        }catch(\Exception $e){
            return false;
        }catch(\Error $err){
            return false;
        }catch(\PDOException $PDOe){
            return false;
        }
    }

    public static function update($query){
        return self::$connector->exec($query);
    }

    public static function delete($query){
        self::$connector->exec($query);
    }

    public static function insertPrepare($query, $data){
        $prep = self::$connector->prepare($query);
        return $prep->execute($data);
    }

    public static function execQuerySelect($query){
        $res = self::$connector->query($query);
        return $res->fetch(\PDO::FETCH_ASSOC);
    }

    public static function startTransaction(){
        self::$connector->beginTransaction();
    }

    public static function commit(){
        self::$connector->commit();
    }

    public static function rollBack(){
        self::$connector->rollback();
    }

}