<?php
namespace controllers;

use database\DB;
use database\models\UserModel;
use database\querys\UserQuerys;
use utils\PasswordUtils;
use controllers\TokenRegistroController;

class UserController{
    
    public function registrarUsuario(UserModel $user){

        try {
            DB::conectar();
            
            $tokenController = new TokenRegistroController();

            
            DB::startTransaction();

            $idkey = DB::insert(UserQuerys::crearUser( $user->getEmail(), PasswordUtils::createHash($user->getPass()) ));

            if($idkey == 0){
                throw new \Exception("error al registrarse");
            }

            if(!$tokenController->crearTokenyEnviar($idkey, $user->getEmail())){
                throw new \Exception("no se logro registrar y enviar el token");
            }
            
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
        } catch(\PDOException $pe) {
            DB::rollBack();
        } catch(\Error $err){
            DB::rollBack();
        }
    }

    public function verificarUsuario($token){
        $tokenController = new TokenRegistroController();

        try{
            DB::conectar();

            DB::startTransaction();

            if(!$tokenController->verificaryUsarToken($token)){
                throw new \Exception("Error al utilizar token de verificación");
            }

            $result = DB::execQuerySelect(UserQuerys::getIdUsuarioByIdToken($token));

            if(empty($result)){
                throw new \Exception("No se encontró al usuario asociado al token");
            }

            if(!DB::insert_value_boolean(UserQuerys::activarUsuario($result["id_user"]))){
                throw new \Exception("No se pudo validar al usuario");
            }

            DB::commit();

            return true;
        }catch(\Exception $e){
            DB::rollBack();
        }catch(\PDOException $PDOe){
            DB::rollBack();
        }catch(\Error $err){
            DB::rollBack();
        }
    }

    public function actualizarUsuario(){

    }

    public function agregarFavorito(){

    }

}