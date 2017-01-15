<?php

error_reporting(0);

include_once './autoload.php';
include_once './../autoload.php';


$Controll = new CONTROLLERcartoes_itens();
$_ID = ($_POST['id']);
$_ID_CARTAO = ($_POST['id_cartao']);
$_DATACOMPRA = ($_POST['datacompra']);
$_DESCRICAO = ($_POST['descricao']);
$_VALOR = ($_POST['valor']);
$_PARCELAS = ($_POST['parcelas']);
$_ID_CENTROCUSTO = ($_POST['id_centrocusto']);

if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}

if ($metodo == 'add') {
    $Obj = new cartoes_itens(0, $_ID_CARTAO, $_DATACOMPRA, $_DESCRICAO, $_VALOR, $_PARCELAS, $_ID_CENTROCUSTO);
    $erro = $Controll->Save($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
}

if ($metodo == "edit") {
    $Obj = new cartoes_itens($_ID, $_ID_CARTAO, $_DATACOMPRA, $_DESCRICAO, $_VALOR, $_PARCELAS, $_ID_CENTROCUSTO);
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
    $Obj = new cartoes_itens($_ID);
    $erro = $Controll->RecuperaByID($Obj);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
    header('Content-Type: application/json');
    echo json_encode($Obj->getFields(false));
}
