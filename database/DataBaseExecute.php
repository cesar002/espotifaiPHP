<?php
namespace database\DataBaseExecute;

include 'DataBaseConnector.php';

use database\DatabaseConnector\DatabaseConnector;

class DataBaseExecute extends DatabaseConnector {

    public function execQueryResult($query){
        $this->conector->query($query);
    }

    public function execQuery($query){

    }

}