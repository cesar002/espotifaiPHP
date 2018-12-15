<?php
namespace controllers;

use utils\EmailSend;
use database\DB;
use database\querys\RecuperarPassQuerys;
use database\querys\UserQuerys;
use utils\DatesUtils;
use utils\TokenGenerator;

class RecuperarPassController {

    public static function reSendEmailRecuperacion($email){
        try {
            DB::conectar();
            DB::startTransaction();

            $result = DB::execQuerySelect(UserQuerys::getUsuarioByEmail($email));

            if(empty($result)){
                throw new \Exception("usuario no encontrado");
            }

            if($result["verificado"] == 0){
                throw new \Exception("usuario no verificado aun");
            }

            $token = TokenGenerator::generateRandomBytesToken(30);

            if( !DB::insert_value_boolean(RecuperarPassQuerys::registrarToken($result["id_user"], $token, DatesUtils::addDaysToCurrentDate(3))) ){
                throw new \Exception("Error al generar el token");
            }

            EmailSend::sendEmailRecuperarPass($email, $token);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            return false;
        } catch(\Error $err) {
            return false;
        } catch(\PDOException $PDOe) {
            return false;
        }

    }

    public static function validateTokenRecuperacion($token){

    }

    public static function verificarCaducidadToken($token){
        try{
            DB::conectar();

            $result = DB::execQuerySelect(RecuperarPassQuerys::findTokenByIdToken($token));

            if(empty($result)){
                throw new \Exception("El token no existe");
            }

            if($result["usado"] == 1){
                throw new \Exception("Error al usar el token");
            }

            if(DatesUtils::comparerWithCurrentDate($result["fecha_expiracion"])){
                throw new \Exception("El token ya expiro");
            }

            return true;
        }catch(\Exception $e){
            return false;
        }catch(\Error $err){
            return false;
        }catch(\PDOException $PDOe){
            return false;
        }
    }

}