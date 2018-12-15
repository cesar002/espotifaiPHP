<?php
include_once '../utils/LoadFiles.php';

autoLoad();

//use middelware\Login;

$tipoMethod = $_SERVER["REQUEST_METHOD"];

if($tipoMethod == "POST"){
    if(!isset($_POST["token"])){
        header("../public/index.php");
    }

    

}else{
    header("../public/index.php");
}
