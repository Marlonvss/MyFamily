<?php

include_once '../model/model_base.php';
include_once './model/model_base.php';
include_once '../model_base.php';
include_once './model_base.php';

class individual extends base {

    public $id_convite;
    public $nome;
    public $origem;          /* [R|M] Rafaelle ou Marlon */
    public $genero;          /* [M|F|C] Masculino, Feminino ou Criança */
    public $confirmado;      /* [-1|0|1] Não informado, Não Confirmado ou Confirmado */
    public $dataconfirmacao;

    function __construct($_id = 0, $_id_convite = 0, $_nome = '', $_origem = '', $_genero = '', $_confirmado = -1, $_dataconfirmacao = '') {
        $this->id = (int)$_id;
        $this->id_convite = (int)$_id_convite;
        $this->nome = (string)$_nome;
        $this->origem = (string)$_origem;
        $this->genero = (string)$_genero;
        $this->confirmado = (int)$_confirmado;
        $this->dataconfirmacao = $_dataconfirmacao;
    }

}
