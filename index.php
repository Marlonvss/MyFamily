<?php

include_once '/autoload.php';
$model = new usuario(1);
$model->id = 'teste';
var_dump($model);

$cont = new CONTROLLERusuario();

$rest = $cont->RecuperaByID($model);
var_dump($rest);
$model->GetMemento();
$model->login = 'TESTANDO';

var_dump($model->GetMemento());
var_dump($model);

//foreach ($list as $t) {
//    var_dump($t);
//}
//
//$model->login = 'marlon';
//$model->senha = 'marlon';
//
//$dao->Update($model);
//var_dump($list);


