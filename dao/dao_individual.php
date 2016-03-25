<?php

error_reporting(E_ERROR);

include_once "../conexao.php";
include_once "../model/model_individual.php";
include_once "./conexao.php";
include_once "./model/model_individual.php";
Conecta();

function _GetIndividual($Id) {

    $strsql = 'select id, id_convite, nome, origem, genero, confirmado, dataconfirmacao '
            . ' from individuais where id = ' . $Id . ' order by id ';
    $rs = mysql_query($strsql);

    while ($row = mysql_fetch_array($rs)) {
        $obj = new individual($row['id'], $row['id_convite'], $row['nome'], $row['origem'], $row['genero'], $row['confirmado'], $row['dataconfirmacao']);
        break;
    }
    return $obj;
}

function _GetIndividuais($Where = NULL) {


    $strsql = 'select id, id_convite, nome, origem, genero, confirmado, dataconfirmacao '
            . ' from individuais  ' . $Where . ' order by id ';
    $rs = mysql_query($strsql);

    $lst = array();
    $i = 0;

    while ($row = mysql_fetch_array($rs)) {
        $obj = new individual($row['id'], $row['id_convite'], $row['nome'], $row['origem'], $row['genero'], $row['confirmado'], $row['dataconfirmacao']);
        $lst[$i] = $obj;
        $i++;
    }
    return $lst;
}

function _AddIndividual($Individual) {
    $strsql = 'insert into individuais ( id_convite, nome, origem, genero, confirmado, dataconfirmacao ) '
            . 'values (' . $Individual->id_convite . ',"' . $Individual->nome . '","' . $Individual->origem . '","' . $Individual->genero . '",' . $Individual->confirmado . ',"' . $Individual->dataconfirmacao . '")';

    if (!mysql_query($strsql)) {
        return mysql_error();
    } else {
        $Individual->id = mysql_insert_id();;
        return '';
    }
}

function _UpdateIndividual($Individual) {
    $strsql = 'update individuais '
            . '   set id_convite = ' . $Individual->id_convite . ', '
            . '       nome = "' . $Individual->nome . '", '
            . '       origem = "' . $Individual->origem . '", '
            . '       genero = "' . $Individual->genero . '", '
            . '       confirmado = ' . $Individual->confirmado . ', '
            . '       dataconfirmacao = "' . $Individual->dataconfirmacao . '"'
            . ' where id = ' . $Individual->id;

    if (!mysql_query($strsql)) {
        return mysql_error();
    } else {
        return '';
    }
}

function _DeleteIndividual($Individual) {
    $strsql = 'delete '
            . '  from individuais '
            . ' where id = ' . $Individual->id;

    if (!mysql_query($strsql)) {
        return mysql_error();
    } else {
        return '';
    }
}
