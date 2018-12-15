<?php
namespace controllers;

use database\DB;
use utils\PasswordUtils;
use database\querys\LoginQuery;
use controllers\SessionService;

class LoginController{

    public static function Login($email, $password){
        
        try {
            DB::conectar();

            $result = DB::execQuerySelect(LoginQuery::loginQuery($email, $password));

            if(empty($result)){
                throw new \Exception("no se encontró al usuario");
            }
            if($result["verificado"] == 0){
                throw new \Exception("usuario no verificado");
            }

            if(PasswordUtils::verify($password, $result["password"])){
                SessionService::Login($result["id_user"], $email);

                return true;
            }else{
                return false;
            }

        }catch(\Exception $e) {
            return false;
        }catch(\Error $err) {
            return false;
        }catch(\PDOException $PDOe) {
            return false;
        }
    }

}