<?php

include_once '../autoload.php';

$Controll = new CONTROLLERusuario();

$erro = $Controll->RecuperaLista($List);
if ($erro->erro) {
    echo '{"erro":' . $erro->mensagem . '}';
} else {
    echo json_encode($List);
}
