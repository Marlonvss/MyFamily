<?php

include_once "./dao/dao_usuario.php";
include_once "../dao/dao_usuario.php";

function RecuperaTodosUsuarios($Where = NULL) {
    $Lista = _GetUsuarios($Where);
    return $Lista;
}