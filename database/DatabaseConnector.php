<?php
namespace database\DatabaseConnector;

include 'DatabaseData.php';

use database\DatabaseData\DatabaseData;

class DatabaseConnector {
    protected $conector;

    protected function conectar(){
        try{
            $this->conector = new \PDO("mysql:dbname=".DatabaseData::getDBName()."; host=".DatabaseData::getHost(),DatabaseData::getUser(),DatabaseData::getPass());
        }catch(Exception $e){
            return false;
        }
    }

    protected function startTransaction(){
        $this->conector->beginTransaction();
    }

    protected function commit(){
        $this->conector->commit();
    }

    protected function rollBack(){
        $this->conector->rollback();
    }

}