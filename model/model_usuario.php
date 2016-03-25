<?php

include_once '../model/model_base.php';
include_once './model/model_base.php';
include_once '../model_base.php';
include_once './model_base.php';

class usuario extends base {

    public $login;
    public $senha;

    function __construct($_id = 0, $_login = '', $_senha = '') {
        $this->id = (int)$_id;
        $this->login = (string)$_login;
        $this->senha = (string)$_senha;
    }

}
