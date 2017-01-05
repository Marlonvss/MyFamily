<!--
Classe gerada pelo Gerenciador de Classes da WebLick Sistemas
-->


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
