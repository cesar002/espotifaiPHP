<?php

$typeMethod = $_SERVER["REQUEST_METHOD"];

switch($typeMethod){
    case "GET":
        header("Location: ./public/index.html");
    break;
    default:

}