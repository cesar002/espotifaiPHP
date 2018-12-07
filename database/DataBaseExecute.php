<?php
namespace database\DataBaseExecute;

include 'DataBaseConnector.php';

use database\DatabaseConnector\DatabaseConnector;

class DataBaseExecute extends DatabaseConnector {

    public function execQueryWithResult($query){

        $res = $this->conector->query($query);
        return $res->fetch(PDO::FETCH_ASSOC);

    }

    public function execQuery($query){
        $this->conector->exec($query);
        return true;
    }

}