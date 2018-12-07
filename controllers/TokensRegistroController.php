<?php
namespace controllers;

include '../database/DataBaseExecute.php';
include '../database/querys/TokenRegistroQuerys.php';
use database\DataBaseExecute\DataBaseExecute;
use database\querys\TokenRegistroQuery;

class TokenRegistroController extends DataBaseExecute{

    public function verificarToken($token){
        $result = $this->execQueryWithResult(TokenRegistroQuery::buscarToken($token));

        if(!empty($result)){
            if($result["usado"] == 0){
                if(strtotime($result["fecha_expiracion"]) > strtotime(date("y-m-d"))){
                    return true;
                }
            }
            return false;
        }
        
        return false;
    }

    public function verificaryUsarToken($token, $fechaUso){
        if($this->verificarToken($token)){
            if($this->usarToken($token)){
                return true;
            }
        }
    }

    public function usarToken($token){
        return $this->execQuery(TokenRegistroQuery::ponerTokenComoUsado($token));
    }

    public function crearToken(){
        // return $this->execQuery(TokenRegistroQuery::crearToken($token,$idUser,date("y-m-d"), date_add(date("y/m/d"))));
    }



}