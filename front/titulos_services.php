<?php

error_reporting(0);
session_start();

include_once './autoload.php';
include_once './../autoload.php';


$Controll = new CONTROLLERtitulos();
$_ID = ($_POST['id']);
$_DESCRICAO = ($_POST['descricao']);
$_VENCIMENTO = ($_POST['vencimento']);
$_VALOR = str_replace(',', '.', ($_POST['valor']));
$_VALORPAGO = str_replace(',', '.', ($_POST['valorpago']));
$_QUITADO = ($_POST['quitado']);
$_OBSERVACAO = ($_POST['observacao']);
$_ID_CLASSIFICACAOFINANCEIRA = ($_POST['id_classificacaofinanceira']);
$_ID_CENTROCUSTO = ($_POST['id_centrocusto']);
$_ID_FAMILIA = unserialize($_SESSION['userLogged'])->id_familia;


if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}

if ($metodo == 'add') {
    $Obj = new titulos(0, $_DESCRICAO, $_VENCIMENTO, $_VALOR, $_VALORPAGO, $_QUITADO, $_OBSERVACAO, $_ID_CLASSIFICACAOFINANCEIRA, $_ID_CENTROCUSTO, $_ID_FAMILIA);
    $erro = $Controll->Save($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
}

if ($metodo == "edit") {
    $Obj = new titulos($_ID, $_DESCRICAO, $_VENCIMENTO, $_VALOR, $_VALORPAGO, $_QUITADO, $_OBSERVACAO, $_ID_CLASSIFICACAOFINANCEIRA, $_ID_CENTROCUSTO, $_ID_FAMILIA);
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
    $Obj = new titulos($_ID);
    $erro = $Controll->RecuperaByID($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
    header('Content-Type: application/json');
    echo json_encode($Obj->getFields(false));
}
