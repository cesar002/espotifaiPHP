<?php
session_start();
$typeMethod = $_SERVER["REQUEST_METHOD"];

switch($typeMethod){
    case "GET":
        if(!isset($_SESSION["user"])){
            header("Location: ./public/index.php");
        }else{
            header("Location: ./public/home.php");
        }
    break;
    default:

}