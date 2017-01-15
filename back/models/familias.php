<?php

class familias {
    public $id;
    public $nome;

    function __construct($_id = 0, $_nome = '') {
        $this->id = (int)$_id;
        $this->nome = (string)$_nome;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->nome = (string)$row['nome'];
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
        $arr['nome'] = $Separador . $this->nome . $Separador;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'familias';

    }

}
