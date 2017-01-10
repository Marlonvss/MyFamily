<?php

class usuarios {
    public $id;
    public $login;
    public $senha;

    function __construct($_id = 0, $_login = '', $_senha = '') {
        $this->id = (int)$_id;
        $this->login = (string)$_login;
        $this->senha = (string)$_senha;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->login = (string)$row['login'];
        $this->senha = (string)$row['senha'];
    }

    // FieldsForCrud
    function getFields($Formatado = true) {
        $arr = array();

        if ($Formatado) {
            $Separador = '"';
        } else {
            $Separador = '';
        }   
        
        $arr['id'] = $this->id;
        $arr['login'] = $Separador . $this->login . $Separador;
        $arr['senha'] = $Separador . $this->senha . $Separador;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'usuarios';

    }

}
