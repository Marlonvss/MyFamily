<?php

error_reporting(E_ALL);
session_start();
include_once './model/model_usuario.php';
include_once './controller/controller_usuario.php';

// Buscando Login e Senha digitados pelo usuario
$_LOGIN = ($_POST['login']);
$_SENHA = ($_POST['senha']);

// Limpa Sessão
unset($_SESSION['adm']);
unset($_SESSION['msg']);

// Recupera Todos Usuarios
$ArrayUsuarios = RecuperaTodosUsuarios();

foreach ($ArrayUsuarios as &$usuario) {

    if ((strtolower($usuario->login) == strtolower($_LOGIN)) and ( strtolower($usuario->senha) == strtolower($_SENHA))) {

        setcookie("Casamento", $usuario->id);
        $_SESSION['adm'] = serialize($usuario);
        break;
    }
}
if (!isset($_SESSION['adm'])) {
    $_SESSION['msg'] = 'Usuário ou senha nao confere!';
}
header("Location:admin.php");
