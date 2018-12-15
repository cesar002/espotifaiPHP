<?php

include_once '../utils/LoadFiles.php';

autoLoad();

use controllers\SessionService;

$tipoMethod = $_SERVER["REQUEST_METHOD"];

if($tipoMethod == "GET"){
    SessionService::Logout();

    header("Location: ../public/index.php");
}else{

}