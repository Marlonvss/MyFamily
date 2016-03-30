<?php

include_once '/autoload.php';
$model = new usuario(1);
var_dump($model);

$dao = new DAOusuario();

$dao->GetByID($model);
var_dump($model);
//
//$model->login = 'marlon';
//$model->senha = 'marlon';
//
//$dao->Update($model);
//var_dump($list);


