<?php
namespace controllers;

use database\DB;
use database\querys\TokenRegistroQuerys;
use utils\DatesUtils;
use utils\TokenGenerator;
use utils\EmailSend;

class TokenRegistroController{

    public function verificarToken($token){
        $result = DB::execQuerySelect(TokenRegistroQuerys::buscarToken($token));

        if(!empty($result)){
            if($result["usado"] == 0){
                if(!DatesUtils::comparerWithCurrentDate($result["fecha_expiracion"])){
                    return true;
                }
                return false;
            }
            return false;
        }
        
        return false;
    }

    public function verificaryUsarToken($token){
        if($this->verificarToken($token)){
            if($this->usarToken($token)){
                return true;
            }
            return false;
        }
        return false;
    }

    public function usarToken($token){
        return DB::insert_value_boolean(TokenRegistroQuerys::ponerTokenComoUsado($token));
    }

    public function crearToken($id_user){
        return DB::insert(TokenRegistroQuerys::crearToken(TokenGenerator::generateOpenSSLToken(20), $id_user, DatesUtils::addDaysToCurrentDate(5)));
    }

    public function crearTokenyEnviar($id_user, $emai){
        $token = TokenGenerator::generateOpenSSLToken(20);

        if( DB::insert_value_boolean(TokenRegistroQuerys::crearToken($token, $id_user, DatesUtils::addDaysToCurrentDate(2))) ){
            EmailSend::sendEmailToken($emai, $token);
            return true;
        }
        return false;
    }


}