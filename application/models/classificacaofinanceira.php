<?php

class classificacaofinanceira {

    public $id;
    public $descricao;

    function __construct($_id = 0, $_descricao = '') {
        $this->id = (int)$_id;
        $this->descricao = (string)$_descricao;
    }

    function RefreshByRow($row) {
        $this->id = $row['id'];
        $this->descricao = $row['descricao'];
    }

    // FieldsForCrud
    function getArray() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['descricao'] = '"' . $this->descricao . '"';

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'CLASSIFICACOESFINANCEIRAS';
    }

}
