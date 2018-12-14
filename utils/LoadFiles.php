<?php


function autoLoad() {
    spl_autoload_register(function ($class){
        // $data = "../" .str_replace('\\', '/', $class).".php";
        if(file_exists("../" .str_replace('\\', '/', $class).".php")){
            include_once("../" .str_replace('\\', '/', $class).".php");
        }
    });
}