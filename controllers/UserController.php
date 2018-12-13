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

            // $this->conectar();
            // $this->startTransaction();

            // $this->execQuery(UserQuery::crearUser($user->getEmail(), PasswordUtils::createHash($user->getPass()) ));

            // $idkey = $this->conector->lastInsertId();
            if($idkey == 0){
                throw new \Exception("llave duplicada, ese usuario ya existe");
            }

            if(!$tokenController->crearTokenyEnviar($idkey, $user->getEmail())){
                throw new \Exception("no se logro registrar y enviar el token");
            }

            // if(!$tokenController->crearTokenyEnviar($idkey, $user->getEmail())){
            //     throw new \Exception("no se logro registrar y enviar el token");
            // }

            
            DB::commit();
            // $this->commit();
        } catch (\Exception $e) {
            // $this->rollBack();
            DB::rollBack();
        } catch(\PDOException $pe) {
            // $this->rollBack();
            DB::rollBack();
        } catch(\Error $err){
            DB::rollBack();
        }
    }

    public function actualizarUsuario(){

    }

    public function agregarFavorito(){

    }

}