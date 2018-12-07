<?php
include '../controllers/UserController.php';
use controllers\UserController\UserController;
use database\models\UserModel;

$usuario = new UserModel();

$usuario->setEmail("gundam@gmail.com");
$usuario->setPass("unodostres");

$controller = new UserController();

$controller->registrarUsuario($usuario);