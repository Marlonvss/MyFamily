<?php

class centrocusto {

    private $memento;

    public $id;
    public $descricao;

    function __construct($_id = 0, $_descricao = '') {
        $this->id = (int) $_id;
        $this->descricao = (string) $_descricao;
    }

    function SaveMemento() {
        if (isset($memento)) {
            unset($memento);
        }
        $memento = new centrocusto($this->id, $this->descricao);
    }

    function GetMemento() {
        if (isset($memento)) {
            return $memento;
        }
    }
    
    function RefreshByRow($row) {
        $this->id = $row['id'];
        $this->descricao = $row['descricao'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['descricao'] = '"' . $this->descricao . '"';

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'CENTROSCUSTOS';
    }

}
