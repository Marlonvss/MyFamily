<?php

include_once './controller/controller_mensagem.php';
include_once './model/model_mensagem.php';

if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}

if ($metodo == "AddMensagem") {

    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
    }
    if (isset($_POST['mensagem'])) {
        $mensagem = $_POST['mensagem'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    echo AddMensagem($nome, $mensagem, $email);
}