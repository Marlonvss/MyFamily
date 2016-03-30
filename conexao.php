<?php

error_reporting(E_ERROR);

function Conecta() {

    if ($_SERVER['HTTP_HOST'] == 'localhost') {

        // Configuração Local...
        $Host = 'localhost';
        $User = 'root';
        $Pass = 'root';
        $BD = 'myfamily';
        
    } else {

        // Configuração Local...
        $Host = 'localhost';
        $User = 'root';
        $Pass = 'root';
        $BD = 'myfamily';
        
    }

    $connect = mysql_connect($Host, $User, $Pass) or die(mysql_error());
    $db = mysql_select_db($BD) or die(mysql_error());

    return $connect;
}
