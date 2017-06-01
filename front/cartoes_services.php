<?php

error_reporting(0);
session_start();

include_once './autoload.php';
include_once './../autoload.php';


$Controll = new CONTROLLERcartoes();
$_ID = ($_POST['id']);
$_DESCRICAO = ($_POST['descricao']);
$_NUMERO = ($_POST['numero']);
$_LIMITE = ($_POST['limite']);
$_DIA_FECHAMENTO = ($_POST['dia_fechamento']);
$_DIA_VENCIMENTO = ($_POST['dia_vencimento']);
$_ID_FAMILIA = unserialize($_SESSION['userLogged'])->id_familia;
$_ID_CLASSIFICACAOFINANCEIRA = ($_POST['id_classificacaofinanceira']);

if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}

if ($metodo == 'add') {
    $Obj = new cartoes(0, $_DESCRICAO, $_NUMERO, $_LIMITE, $_DIA_FECHAMENTO, $_DIA_VENCIMENTO, $_ID_FAMILIA, $_ID_CLASSIFICACAOFINANCEIRA);
    $erro = $Controll->Save($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
}

if ($metodo == "edit") {
    $Obj = new cartoes($_ID, $_DESCRICAO, $_NUMERO, $_LIMITE, $_DIA_FECHAMENTO, $_DIA_VENCIMENTO, $_ID_FAMILIA, $_ID_CLASSIFICACAOFINANCEIRA);
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
    $Obj = new cartoes($_ID);
    $erro = $Controll->RecuperaByID($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
    header('Content-Type: application/json');
    echo json_encode($Obj->getFields(false));
}


if ($metodo == "refresh_cartoes") {
    $erro = $Controll->RefreshFaturaByCartaoMesAno($_ID);
    if ($erro->erro) {
        echo $erro->mensagem;
    }

//    header('Content-Type: application/json');
//    echo json_encode($Obj->getFields(false));
}