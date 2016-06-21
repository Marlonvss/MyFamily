<?php

class usuario {

    private $memento;
    
    public $id;
    public $login;
    public $senha;

    // Constructor básico
    function __construct($_id = 0, $_login = '', $_senha = '') {
        $this->id = (int) $_id;
        $this->login = (string) $_login;
        $this->senha = (string) $_senha;
    }

    function SaveMemento() {
        if (isset($memento)) {
            unset($memento);
        }
        $memento = new usuario($this->id, $this->login, $this->senha);
    }

    function GetMemento() {
        if (isset($memento)) {
            return $memento;
        }
    }

    function RefreshByRow($row) {
        $this->id = $row['id'];
        $this->login = $row['login'];
        $this->senha = $row['senha'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['login'] = '"' . $this->login . '"';
        $arr['senha'] = '"' . $this->senha . '"';

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'usuarios';
    }

}
