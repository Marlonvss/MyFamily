<?php

error_reporting(0);
session_start();
include_once './autoload.php';
include_once './back/consts/links.php';

if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}
if ($metodo == "login") {

    unset($_SESSION['userLogged']);

// Buscando Login e Senha digitados pelo usuario
    $_LOGIN = ($_POST['login']);
    $_SENHA = ($_POST['senha']);

    if (($_LOGIN == "") or ( $_SENHA == "")) {
        echo 'false';
    } else {
        $userControl = new CONTROLLERusuarios();

        $erro = $userControl->RecuperaLista($userList);
        if ($erro->erro) {
//            echo $erro->mensagem;
        } else {

            foreach ($userList as &$user) {
                if ((strtolower($user->login) == strtolower($_LOGIN)) and ( strtolower($user->senha) == strtolower($_SENHA))) {
                    setcookie("myfamily", $user->id );
                    $_SESSION['userLogged'] = serialize($user);
                    break;
                }
            }

            if (isset($_SESSION['userLogged'])) {
                echo 'true';
            } else {
                echo 'false';
            }
        }
    }
}
?>


