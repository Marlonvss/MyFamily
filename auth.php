<?php

error_reporting(E_ALL);
session_start();
include_once './autoload.php';
include_once './back/consts/links.php';

// Buscando Login e Senha digitados pelo usuario
$_LOGIN = ($_POST['usuario']);
$_SENHA = ($_POST['senha']);

// Recupera Todos Usuarios
$userControl = new CONTROLLERusuario();

$erro = $userControl->RecuperaLista($userList);
if ($erro->erro) {
    echo $erro->mensagem;
} else {
     
    foreach ($userList as &$user) {
        if ((strtolower($user->login) == strtolower($_LOGIN)) and ( strtolower($user->senha) == strtolower($_SENHA))) {
            setcookie("myfamily", $user->id);
            $_SESSION['userLogged'] = serialize($user);
            break;
        }
    }

    if (!isset($_SESSION['userLogged'])) {
        $_SESSION['alert'] = 'Usuário ou senha nao confere!';
    }
}
header('location:'. $pag_index .'.php');
