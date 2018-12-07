<?php
namespace database\DataBaseExecute;

include 'DataBaseConnector.php';

use database\DatabaseConnector\DatabaseConnector;

class DataBaseExecute extends DatabaseConnector {

    public function execQueryWithResult($query){
        try {
            $res = $this->conector->query($query);
            return $res->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
        }

    }

    public function execQuery($query){
        try{
            $this->conector->exec($query);
            return true;
        }catch(Exception $e){}
    }

}