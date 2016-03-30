<?php

include_once "./dao/dao_convite.php";
include_once "../dao/dao_convite.php";

function RecuperaTodosConvites($Where = NULL) {
    $Lista = _GetConvites($Where);
    return $Lista;
}

function AddConvite($Convite){
    return _AddConvite($Convite);
}

function GetConvite($id){
    return _GetConvite($id);
}

function GetConviteByCodigo($numero){
    return _GetConvites('where numero = "'.$numero.'"')[1];
}

function DeletarConvite($id){
    $Obj = new convite($id);
    return _DeleteConvite($Obj);
}

function AlterConvite($Convite){
    return _UpdateConvite($Convite);
}