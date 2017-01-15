<?php

session_start();

if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}

if ($metodo == 'alteraProcesso') {
    AtualizaMesAnoProcesso();
    $_Data = $_SESSION['ano'] . "-" . $_SESSION['mes'] . "-01";

    $_Meses = ($_POST['months']);
    if ($_Meses == 1) {
        $_Data = date("Y-m-d", strtotime(date("Y-m-d", strtotime($_Data)) . " +1 month"));
    } else {
        $_Data = date("Y-m-d", strtotime(date("Y-m-d", strtotime($_Data)) . " -1 month"));
    }

    $_SESSION['mes'] = date('m', strtotime($_Data));
    $_SESSION['ano'] = date('y', strtotime($_Data));
}

function AtualizaMesAnoProcesso() {
    if (isset($_SESSION['mes'])) {
        $_Mes = $_SESSION['mes'];
    } else {
        $_Mes = date('m');
    }
    if (isset($_SESSION['ano'])) {
        $_Ano = $_SESSION['ano'];
    } else {
        $_Ano = date('y');
    }

    $_SESSION['mes'] = $_Mes;
    $_SESSION['ano'] = $_Ano;
}

function getMesAnoProcesso() {

    AtualizaMesAnoProcesso();

    switch ($_SESSION['mes']) {
        case 1: $_MesExtenso = 'Janeiro';
            break;
        case 2: $_MesExtenso = 'Fevereiro';
            break;
        case 3: $_MesExtenso = 'Março';
            break;
        case 4: $_MesExtenso = 'Abril';
            break;
        case 5: $_MesExtenso = 'Maio';
            break;
        case 6: $_MesExtenso = 'Junho';
            break;
        case 7: $_MesExtenso = 'Julho';
            break;
        case 8: $_MesExtenso = 'Agosto';
            break;
        case 9: $_MesExtenso = 'Setembro';
            break;
        case 10: $_MesExtenso = 'Outubro';
            break;
        case 11: $_MesExtenso = 'Novembro';
            break;
        case 12: $_MesExtenso = 'Dezembro';
            break;
    }

    return $_MesExtenso . "/" . $_SESSION['ano'];
}
