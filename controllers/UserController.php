<?php
namespace controllers\UserController;

include '../database/DatabaseExecute.php';
include '../database/models/UserModel.php';
include '../database/querys/UserQuerys.php';
include '../utils/PasswordUtils.php';

use database\DataBaseExecute\DataBaseExecute;
use database\models\UserModel;
use database\querys\UserQuery;
use utils\PasswordUtils;

class UserController extends DataBaseExecute{
    
    public function registrarUsuario(UserModel $user){
        try {
            $this->conectar();
            $this->startTransaction();

            $this->execQuery(UserQuery::crearUser($user->getEmail(), PasswordUtils::createHash($user->getPass()) ));

            print_r($this->conector->lastInsertId());
            echo("<br>");
            $this->commit();
            print_r($this->conector->lastInsertId());
        } catch (Exception $e) {
            $this->rollBack();
        }
    }

    public function actualizarUsuario(){

    }

    public function agregarFavorito(){

    }

}