<?php

error_reporting(E_ERROR);
include_once './back/consts/parameters.php';
include_once '../back/consts/parameters.php';

function Conecta() {
   
    if ($GLOBALS['IsLocal']) {
        // Configuração Local...
        $Host = 'localhost';
        $User = 'root';
        $Pass = 'root';
        $BD = 'myfamily';
    } else {
        // Configuração Local...
        $Host = 'mysql.hostinger.com.br';
        $User = 'u221687359_famil';
        $Pass = 'family123';
        $BD = 'u221687359_famil';
    }

    $connect = mysql_connect($Host, $User, $Pass) or die(mysql_error());
    $db = mysql_select_db($BD) or die(mysql_error());

    return $connect;
}
