<?php

class rateio {

    private $memento;
    
    public $id;
    public $id_centrocusto;
    public $id_classificacao;
    public $id_titulo;
    public $valor;
    public $descricao;

    function __construct($_id = 0, $_id_centrocusto = 0, $_id_classificacao = 0, $_id_titulo = 0, $_valor = 0, $_descricao = '') {
        $this->id = (int)$_id;
        $this->id_centrocusto = (int)$_id_centrocusto;
        $this->id_classificacao = (int)$_id_classificacao;
        $this->id_titulo = (int)$_id_titulo;
        $this->descricao = (string)$_descricao;
        $this->valor = (float)$_valor;
    }

    function SaveMemento() {
        if (isset($memento)) {
            unset($memento);
        }
        $memento = new rateio($this->id, $this->id_centrocusto, $this->id_classificacao, $this->id_titulo, $this->valor, $this->descricao);
    }

    function GetMemento() {
        if (isset($memento)) {
            return $memento;
        }
    }    
    
    function RefreshByRow($row){
        $this->id = $row['id'];
        $this->id_centrocusto = $row['id_centrocusto'];
        $this->id_classificacao = $row['id_classificacao'];
        $this->id_titulo = $row['id_titulo'];
        $this->descricao = $row['descricao'];
        $this->valor = $row['valor'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['id_centrocusto'] = $this->id_centrocusto;
        $arr['id_classificacao'] = $this->id_classificacao;
        $arr['id_titulo'] = $this->id_titulo;
        $arr['descricao'] = '"'.$this->descricao.'"';
        $arr['valor'] = $this->valor;
        
        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'RATEIOS';
    }

}
