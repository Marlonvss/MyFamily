<?php

class usuario {

    public $id;
    public $login;
    public $senha;

    // Constructor básico
    function __construct($_id = 0, $_login = '', $_senha = '') {
        $this->id = (int) $_id;
        $this->login = (string) $_login;
        $this->senha = (string) $_senha;
    }
    
    function RefreshByRow($row){
        $this->id = $row['id'];
        $this->login = $row['login'];
        $this->senha = $row['senha'];
    }

    // FieldsForCrud
    function getArray() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['login'] = '"'. $this->login .'"';
        $arr['senha'] = '"'. $this->senha .'"';
        
        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'USUARIOS';
    }

}
