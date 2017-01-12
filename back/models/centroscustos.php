<?php

class centroscustos {
    public $id;
    public $descricao;

    function __construct($_id = 0, $_descricao = '') {
        $this->id = (int)$_id;
        $this->descricao = (string)$_descricao;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->descricao = (string)$row['descricao'];
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
        $arr['descricao'] = $Separador . $this->descricao . $Separador;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'centroscustos';

    }

}
