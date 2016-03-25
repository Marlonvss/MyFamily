<?php

include_once '../model/model_base.php';
include_once './model/model_base.php';
include_once '../model_base.php';
include_once './model_base.php';

class convite extends base {

    public $familia;
    public $numero;

    function __construct($_id = 0, $_familia = '', $_numero = '') {
        $this->id = (int) $_id;
        $this->familia = (string) $_familia;
        $this->numero = (string) $_numero;
    }

}
