<?php

error_reporting(0);
session_start();

include_once './autoload.php';
include_once './../autoload.php';


$Controll = new CONTROLLERcentroscustos();
$_ID = ($_POST['id']);
$_DESCRICAO = ($_POST['descricao']);
$_ID_FAMILIA = unserialize($_SESSION['userLogged'])->id_familia;


if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}

if ($metodo == 'add') {
    $Obj = new centroscustos(0, $_DESCRICAO, $_ID_FAMILIA);
    $erro = $Controll->Save($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
}

if ($metodo == "edit") {
    $Obj = new centroscustos($_ID, $_DESCRICAO, $_ID_FAMILIA);
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
    $Obj = new centroscustos($_ID);
    $erro = $Controll->RecuperaByID($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
    header('Content-Type: application/json');
    echo json_encode($Obj->getFields(false));
}
