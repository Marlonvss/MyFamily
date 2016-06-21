<?php

class fatura_item {

    private $memento;
    
    public $id;
    public $descricao;
    public $valor;

    function __construct($_id = 0, $_descricao = '', $_valor = 0) {
        $this->id = (int)$_id;
        $this->descricao = (string) $_descricao;
        $this->valor = (int)$_valor;
    }

    function SaveMemento() {
        if (isset($memento)) {
            unset($memento);
        }
        $memento = new fatura_item($this->id, $this->descricao, $this->valor);
    }

    function GetMemento() {
        if (isset($memento)) {
            return $memento;
        }
    }
    
    function RefreshByRow($row) {
        $this->id = $row['id'];
        $this->descricao = $row['descricao'];
        $this->valor = $row['valor'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['descricao'] = '"' . $this->descricao . '"';
        $arr['valor'] = '"' . $this->valor . '"';

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'FATURAS_ITENS';
    }

}
