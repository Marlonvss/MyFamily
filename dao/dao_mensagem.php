<?php

error_reporting(E_ERROR);

include_once "../conexao.php";
include_once "../model/model_mensagem.php";
include_once "./conexao.php";
include_once "./model/model_mensagem.php";
Conecta();

function _GetMensagem($Id) {

    $strsql = 'select id, nome, mensagem, email, respondida '
            . '  from mensagens where id = ' . $Id . ' order by id ';
    $rs = mysql_query($strsql);

    while ($row = mysql_fetch_array($rs)) {
        $obj = new mensagem($row['id'], $row['nome'], $row['email'], $row['mensagem'], $row['respondida']);
        break;
    }
    return $obj;
}

function _GetMensagens($Where = NULL) {


    $strsql = 'select id, nome, mensagem, email, respondida '
            . '  from mensagens ' . $Where . ' order by id ';
    $rs = mysql_query($strsql);

    $lst = array();
    $i = 0;

    while ($row = mysql_fetch_array($rs)) {
        $obj = new mensagem($row['id'], $row['nome'], $row['email'], $row['mensagem'], $row['respondida']);
        $lst[$i] = $obj;
        $i++;
    }
    return $lst;
}

function _AddMensagem($Mensagem) {
    $strsql = 'insert into mensagens ( nome, mensagem, email ) '
            . 'values ("' . $Mensagem->nome . '","' . $Mensagem->mensagem . '","' . $Mensagem->email . '")';

    if (!mysql_query($strsql)) {
        return mysql_error();
    } else {
        $Mensagem->id = mysql_insert_id();;
        return '';
    }
}

function _UpdateMensagem($Mensagem) {
    $strsql = 'update mensagens '
            . '   set nome = "' . $Mensagem->nome . '", '
            . '       mensagem = "' . $Mensagem->mensagem . '", '
            . '       email = "' . $Mensagem->email . '", '
            . '       respondida = ' . $Mensagem->respondida
            . ' where id = ' . $Mensagem->id;
    
    if (!mysql_query($strsql)) {
        return mysql_error();
    } else {
        return '';
    }
}

function _DeleteMensagem($Mensagem) {
    $strsql = 'delete '
            . '  from mensagens '
            . ' where id = ' . $Mensagem->id;

    if (!mysql_query($strsql)) {
        return mysql_error();
    } else {
        return '';
    }
}
