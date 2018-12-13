<?php
namespace controllers;

// include_once '../database/DataBaseExecute.php';
// include_once '../database/querys/TokenRegistroQuerys.php';
// include_once '../utils/DatesUtil.php';
// include_once '../utils/TokenGenerator.php';
// include_once '../utils/EmailSend.php';

use database\DB;
use database\querys\TokenRegistroQuerys;
use utils\DatesUtils;
use utils\TokenGenerator;
use utils\EmailSend;

class TokenRegistroController{

    public function verificarToken($token){
        // $this->conectar();

        //$result = $this->execQueryWithResult(TokenRegistroQuery::buscarToken($token));
        $result = DB::execQuerySelect(TokenRegistroQuery::buscarToken($token));

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
        }
    }

    public function usarToken($token){
        return DB::insert(TokenRegistroQuery::ponerTokenComoUsado($token));
    }

    public function crearToken($id_user){
        return DB::insert(TokenRegistroQuery::crearToken(TokenGenerator::generateOpenSSLToken(20), $id_user, DatesUtils::addDaysToCurrentDate(5)));
    }

    public function crearTokenyEnviar($id_user, $emai){
        $token = TokenGenerator::generateOpenSSLToken(20);

        if( DB::insert_value_boolean(TokenRegistroQuerys::crearToken($token, $id_user, DatesUtils::addDaysToCurrentDate(5))) ){
            EmailSend::sendEmailToken($emai, $token);
            return true;
        }
        return false;
    }


}