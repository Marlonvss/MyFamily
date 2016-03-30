<?php

class pessoa {

    public $id;
    public $nome;
    public $tipo;
    public $id_classificacao;

    function __construct($_id = 0, $_nome = '', $_tipo = 0, $_id_classificacao = 0) {
        $this->id = (int)$_id;
        $this->nome = (string)$_nome;
        $this->tipo = (int)$_tipo;
        $this->id_classificacao = (int)$_id_classificacao;
    }

    function RefreshByRow($row){
        $this->id = $row['id'];
        $this->nome = $row['nome'];
        $this->tipo = $row['tipo'];
        $this->id_classificacao = $row['id_classificacao'];
    }

    // FieldsForCrud
    function getArray() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['nome'] = '"'. $this->nome .'"';
        $arr['tipo'] = $this->tipo;
        $arr['id_classificacao'] = $this->id_classificacao;
        
        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'PESSOAS';
    }

}
