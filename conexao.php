<?php

error_reporting(E_ERROR);

function Conecta() {

    if (eregi('localhost', $_SERVER['HTTP_HOST'])) {

        // Configuração Local...
        $Host = 'localhost';
        $User = 'root';
        $Pass = 'root';
        $BD = 'myfamily';
       
    } else {

        // Configuração Local...
        $Host = 'mysql.hostinger.com.br';
        $User = 'u812671016_famil';
        $Pass = 'familia';
        $BD = 'u812671016_famil';
        
    }

    $connect = mysql_connect($Host, $User, $Pass) or die(mysql_error());
    $db = mysql_select_db($BD) or die(mysql_error());

    return $connect;
}
