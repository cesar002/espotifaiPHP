<?php
include "../middelware/Login.php";
include "../utils/Redirect.php";
include "../utils/URLS.php";

use middelware\Login;
use utils\Redirect;
use const utils\URLS;

$typeMethod = $_SERVER["REQUEST_METHOD"];

if(!Login::isLogin()){
    switch($typeMethod){
        case "POST":
            Redirect::redirectTo(url["paginas"]["index"]);
        break;
        case "GET":

        break;
    }
}else{
    return;
}
