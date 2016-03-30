<?php

include_once "./dao/dao_individual.php";
include_once "../dao/dao_individual.php";

function RecuperaTodosIndividuais($Where = NULL) {
    $Lista = _GetIndividuais($Where);
    return $Lista;
}

function AddIndividual($Individual){
    return _AddIndividual($Individual);
}

function GetIndividual($id){
    return _GetIndividual($id);
}

function DeletarIndividual($id){
    $Obj = new individual($id);
    return _DeleteIndividual($Obj);
}

function AlterIndividual($Individual){
    return _UpdateIndividual($Individual);
}

function ConfirmarPresenca($id) {
    $obj = _GetIndividual($id);
    $obj->confirmado = 1;
    $obj->dataconfirmacao = gmdate('Y/m/d',strtotime('-2 hours'));
//    return $obj->dataconfirmacao;
    
    return _UpdateIndividual($obj);
}

function DesConfirmarPresenca($id) {
    $obj = _GetIndividual($id);
    $obj->confirmado = 0;
    $obj->dataconfirmacao = '';
    
    return _UpdateIndividual($obj);
}

function ConfirmarTodos($convite) {
//    _ConfirmarTodos($convite);
    return 'Error 404 - Method not found!';
}
