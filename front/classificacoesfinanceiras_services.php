<?php

error_reporting(0);

include_once './autoload.php';
include_once './../autoload.php';


$Controll = new CONTROLLERclassificacoesfinanceiras();
$_ID = ($_POST['id']);
$_DESCRICAO = ($_POST['descricao']);
$_LOGIN = ($_POST['login']);
$_SENHA = ($_POST['senha']);


if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}

if ($metodo == 'add') {
    $Obj = new classificacoesfinanceiras(0, $_DESCRICAO);
    $erro = $Controll->Save($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
}

if ($metodo == "edit") {
    $Obj = new classificacoesfinanceiras($_ID, $_DESCRICAO);
    $erro = $Controll->Save($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
}

if ($metodo == "remove") {
    $erro = $Controll->Remove($_ID);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
}

if ($metodo == "load") {
    $Obj = new classificacoesfinanceiras($_ID);
    $erro = $Controll->RecuperaByID($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
    header('Content-Type: application/json');
    echo json_encode($Obj->getFields(false));
}
