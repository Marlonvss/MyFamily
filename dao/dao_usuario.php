<?php

error_reporting(E_ERROR);

include_once "../conexao.php";
include_once "../model/model_usuario.php";
include_once "./conexao.php";
include_once "./model/model_usuario.php";
Conecta();

function _GetUsuario($Id) {

    $strsql = 'select id, login, senha from usuarios where id = ' . $Id . ' order by id ';
    $rs = mysql_query($strsql);

    while ($row = mysql_fetch_array($rs)) {
        $obj = new usuario($row['id'], $row['login'], $row['senha']);
        break;
    }
    return $obj;
}

function _GetUsuarios($Where = NULL) {


    $strsql = 'select id, login, senha from usuarios ' . $Where . ' order by id ';
    $rs = mysql_query($strsql);

    // Cria ARRAY
    $lst = array();
    $i = 0;

    // Loop pelo RecordSet
    while ($row = mysql_fetch_array($rs)) {

        $obj = new usuario($row['id'], $row['login'], $row['senha']);
        $lst[$i] = $obj;
        $i++;
    }

    return $lst;
}

function _AddUsuario($Usuario) {
    $strsql = 'insert into usuarios ( login, senha ) '
            . 'values ("' . $Usuario->login . '", "' . $Usuario->senha . '")';

    if (!mysql_query($strsql)) {
        return mysql_error();
    } else {
        $Usuario->id = mysql_insert_id();;
        return '';
    }
}

function _UpdateUsuario($Usuario) {
    $strsql = 'update usuarios '
            . '   set login = "' . $Usuario->familia . '",'
            . '       senha = "' . $Usuario->senha . '" '
            . ' where id = ' . $Usuario->id;

    if (!mysql_query($strsql)) {
        return mysql_error();
    } else {
        return '';
    }
}

function _DeleteUsuario($Usuario) {
    $strsql = 'delete '
            . '  from usuarios '
            . ' where id = ' . $Usuario->id;

    if (!mysql_query($strsql)) {
        return mysql_error();
    } else {
        return '';
    }
}
