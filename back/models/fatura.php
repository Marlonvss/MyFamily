<?php

class fatura {

    private $memento;
    
    public $id;
    public $vencimento;
    public $id_titulo;

    function __construct($_id = 0, $_vencimento = '', $_id_titulo = 0) {
        $this->id = (int)$_id;
        $this->vencimento = (string) $_vencimento;
        $this->id_titulo = (int)$_id_titulo;
    }

    function SaveMemento() {
        if (isset($memento)) {
            unset($memento);
        }
        $memento = new fatura($this->id, $this->vencimento, $this->id_titulo);
    }

    function GetMemento() {
        if (isset($memento)) {
            return $memento;
        }
    }
    
    function RefreshByRow($row) {
        $this->id = $row['id'];
        $this->vencimento = $row['vencimento'];
        $this->id_titulo = $row['id_titulo'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['vencimento'] = '"' . $this->vencimento . '"';
        $arr['id_titulo'] = '"' . $this->id_titulo . '"';

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'FATURAS';
    }

}
