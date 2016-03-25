<?php

include_once './controller/controller_individual.php';
include_once './model/model_individual.php';

if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}

if ($metodo == "RecuperaConvidados") {
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    echo json_encode(RecuperaTodosIndividuais("where id_convite = (select id from convites where numero = $id )"));
}
if ($metodo == "ConfirmarUsuario") {
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    $Resp = ConfirmarPresenca($id);
    if ($Resp == ''){
        echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Confirmação gravada com sucesso!</strong> </div>';
    } else {
        echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>'. $Resp .'</strong> </div>';
    }
}

if ($metodo == "DesconfirmarUsuario") {
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    $Resp = DesConfirmarPresenca($id);
    if ($Resp == ''){
        echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Cancelamento gravado com sucesso!</strong> </div>';
    } else {
        echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>'. $Resp .'</strong> </div>';
    }
    
}