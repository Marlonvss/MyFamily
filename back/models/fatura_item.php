<?php

class fatura_item {

    private $memento;
    
    public $id;
    public $id_fatura;
    public $descricao;
    public $valor;

    function __construct($_id = 0, $_id_fatura = 0, $_descricao = '', $_valor = 0) {
        $this->id = (int)$_id;
        $this->id_fatura = (int) $_id_fatura;
        $this->descricao = (string) $_descricao;
        $this->valor = (float)$_valor;
    }

    function SaveMemento() {
        if (isset($memento)) {
            unset($memento);
        }
        $memento = new fatura_item($this->id, $this->id_fatura, $this->descricao, $this->valor);
    }

    function GetMemento() {
        if (isset($memento)) {
            return $memento;
        }
    }
    
    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->id_fatura = (int)$row['id_fatura'];
        $this->descricao = (string)$row['descricao'];
        $this->valor = (float)$row['valor'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['id_fatura'] = $this->id_fatura;
        $arr['descricao'] = '"' . $this->descricao . '"';
        $arr['valor'] = '"' . $this->valor . '"';

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'faturas_itens';
    }

}
