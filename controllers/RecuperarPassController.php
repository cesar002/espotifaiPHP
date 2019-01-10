<?php
namespace controllers;

use utils\EmailSend;
use database\DB;
use database\querys\RecuperarPassQuerys;
use database\querys\UserQuerys;
use utils\DatesUtils;
use utils\TokenGenerator;
use utils\PasswordUtils;

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
            DB::rollBack();
            return false;
        } catch(\Error $err) {
            DB::rollBack();
            return false;
        } catch(\PDOException $PDOe) {
            DB::rollBack();
            return false;
        }

    }

    public static function registrarNuevoPassword($newPass, $token){
        try{
            DB::conectar();
            DB::startTransaction();

            if(!self::validateTokenRecuperacion($token)){
                throw new \Exception("token no encontrado");
            }

            $email = DB::execQuerySelect(RecuperarPassQuerys::getEmailByToken($token));

            if(!DB::insert_value_boolean(RecuperarPassQuerys::activarToken($token))){
                throw new \Exception("no se pudo actualizar el token");
            }

            if(empty($email)){
                throw new \Exception("email no encontrado");
            }

            if(!DB::update(RecuperarPassQuerys::actualizarContraseña(PasswordUtils::createHash($newPass), $email))){
                throw new \Exception("error al actualizar la contraseña");
            }

            DB::commit();
            return true;
        }catch(\Exception $e){
            DB::rollBack();
            return false;
        }catch(\Error $err){
            DB::rollBack();
            return false;
        }catch(\PDOException $PDO_e){
            DB::rollBack();
            return false;
        }
    }

    private static function validateTokenRecuperacion($token){
        try{
            DB::conectar();

            $result = DB::execQuerySelect(RecuperarPassQuerys::findTokenByIdToken($token));

            if(empty($result)){
                throw new \Exception("token no encontrado");
            }

            return true;
        }catch(\Exception $e){
            return false;
        }catch(\Error $err){
            return false;
        }catch(\PDOException $PDO_e){
            return false;
        }
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