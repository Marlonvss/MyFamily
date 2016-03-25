<?php

include_once "./dao/dao_mensagem.php";
include_once "../dao/dao_mensagem.php";

function RecuperaTodasMensagens($Where = NULL) {
    $Lista = _GetMensagens($Where);
    return $Lista;
}

function AddMensagem($Nome, $Mensagem, $Email) {
    $obj = new mensagem(0, $Nome, $Email, $Mensagem, false);

    if (!$obj->isValid()) {
        return 'Objeto inválido!';
    } else {
        $Resp = _AddMensagem($obj); 
        if ($Resp == ''){
            return 'Mensagem enviada com sucesso!';  
        } else {
            return $Resp;
        }
    }
}

function MensagemRespondida($id) {
    $Obj = _GetMensagem($id);
    $Obj->respondida = true;

    return _UpdateMensagem($Obj);
}

function DeletarMensagem($id) {
    $Obj = new mensagem($id);

    return _DeleteMensagem($Obj);
}
