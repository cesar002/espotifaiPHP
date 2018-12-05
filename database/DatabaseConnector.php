<?php
namespace database;

include 'DatabaseData.php';

use database\DatabaseData;

class DatabaseConnector {
    protected $conector;

    protected function conectar(){
        try{
            $this->conector = new \PDO("mysql:dbname=".DatabaseData::getDBName()."; host=".DatabaseData::getHost(),DatabaseData::getUser(),DatabaseData::getPass());
        }catch(Exception $e){
            return false;
        }
    }

}