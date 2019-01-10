<?php
include_once '../utils/LoadFiles.php';

autoLoad();

use middelware\Login;
use controllers\RecuperarPassController as rpController;

$tipoMethod = $_SERVER["REQUEST_METHOD"];

if($tipoMethod == "POST"){

    if(!Login::isLogin()){
        header("../public/index.php");
    }

    if(!isset($_POST["token"])){
        header("../public/index.php");
    }
    
    if(rpController::registrarNuevoPassword($_POST["password"], $_POST["token"])){
        
    }
    

}else{
    header("../public/index.php");
}
