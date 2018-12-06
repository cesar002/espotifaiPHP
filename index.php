<?php
include './utils/URLS.PHP';

use const utils\URLS;

session_start();
$typeMethod = $_SERVER["REQUEST_METHOD"];

switch($typeMethod){
    case "GET":
        if(!isset($_SESSION["user"])){
            header("Location: ".url["paginas"]["index"]);
        }else{
            header("Location: ".url["paginas"]["home"]);
        }
    break;
    default:

}