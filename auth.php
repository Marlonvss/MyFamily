<?php

error_reporting(0);
session_start();
include_once './autoload.php';
include_once './back/consts/links.php';

if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}

if ($metodo == "logar") {

    unset($_SESSION['userLogged']);

    // Buscando Login e Senha digitados pelo usuario
    $_EMAIL = ($_POST['email']);
    $_SENHA = md5($_POST['senha']);

    if (($_EMAIL == "") or ($_SENHA == "")) {
        echo 'false';
    } else {
        $userControl = new CONTROLLERusuarios();
        $erro = $userControl->RecuperaLista($userList);
        if ($erro->erro) {
            echo $erro->mensagem;
        } else {
            foreach ($userList as &$user) {
                if ((strtolower($user->email) == strtolower($_EMAIL)) and ( strtolower($user->senha) == strtolower($_SENHA))) {
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


