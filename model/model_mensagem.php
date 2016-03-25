<?php

include_once '../model/model_base.php';
include_once './model/model_base.php';
include_once '../model_base.php';
include_once './model_base.php';

class mensagem extends base {

    public $nome;
    public $email;
    public $mensagem;
    public $respondida;

    function __construct($_id = 0, $_nome = '', $_email = '', $_mensagem = '', $_respondida = false) {
        $this->id = (int)$_id;
        $this->nome = (string)$_nome;
        $this->email = (string)$_email;
        $this->mensagem = (string)$_mensagem;
        $this->respondida = (boolean)$_respondida;
    }

    public function isValid() {
        if ($this->nome == "") {
            return false;
        } else if ($this->mensagem == "") {
            return false;
        } else if ($this->email == "") {
            return false;
        } else {
            return true;
        }
    }

}
