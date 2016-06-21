<?php

class baixa {

    private $memento;

    public $id;
    public $id_rateio;
    public $valor;
    public $data;

    function __construct($_id = 0, $_id_rateio = '', $_valor = 0, $_data = '') {
        $this->id = (int)$_id;
        $this->id_rateio = (string)$_id_rateio;
        $this->valor = (float)$_valor;
        $this->data = $_data;
    }

    function SaveMemento() {
        if (isset($memento)) {
            unset($memento);
        }
        $memento = new baixa($this->id, $this->id_rateio, $this->valor, $this->data);
    }

    function GetMemento() {
        if (isset($memento)) {
            return $memento;
        }
    }
    
    public function isValid() {
        if ($this->id_rateio == '') {
            return false;
        } else if ($this->valor == 0) {
            return false;
        } else if ($this->data == '') {
            return false;
        } else {
            return true;
        }
    }

    
    function RefreshByRow($row){
        $this->id = $row['id'];
        $this->id_rateio = $row['id_rateio'];
        $this->valor = $row['valor'];
        $this->data = $row['data'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['id_rateio'] = $this->id_rateio;
        $arr['valor'] = $this->valor;
        $arr['data'] = '"'. $this->data .'"';
        
        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'BAIXAS';
    }
    
}
