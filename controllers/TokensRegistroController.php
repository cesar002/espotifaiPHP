<?php
namespace controllers;

include '../database/DataBaseExecute.php';
include '../database/querys/TokenRegistroQuerys.php';
include '../utils/DatesUtil.php';
include '../utils/TokenGenerator.php';
include '../utils/EmailSend.php';

use database\DataBaseExecute\DataBaseExecute;
use database\querys\TokenRegistroQuery;
use utils\DatesUtils;
use utils\TokenGenerator;
use utils\EmailSend;

class TokenRegistroController extends DataBaseExecute{

    public function verificarToken($token){
        $result = $this->execQueryWithResult(TokenRegistroQuery::buscarToken($token));

        if(!empty($result)){
            if($result["usado"] == 0){
                if(!DatesUtils::comparerWithCurrentDate($result["fecha_expiracion"])){
                    return true;
                }
                return false;
                // if(strtotime($result["fecha_expiracion"]) > strtotime(date("y-m-d"))){
                //     return true;
                // }
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
        return $this->execQuery(TokenRegistroQuery::ponerTokenComoUsado($token));
    }

    public function crearToken($id_user){
        return $this->execQuery(TokenRegistroQuery::crearToken(TokenGenerator::generateOpenSSLToken(20), $id_user, DatesUtils::addDaysToCurrentDate(5)));
    }

    public function crearTokenyEnviar($id_user, $emai){

        $token = TokenGenerator::generateOpenSSLToken(20);

        if( $this->execQuery(TokenRegistroQuery::crearToken($token, $id_user, DatesUtils::addDaysToCurrentDate(5))) ){
            EmailSend::sendEmailToken($emai, $token);
            return true;
        }

        return false;
    }



}