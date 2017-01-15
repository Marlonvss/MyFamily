<?php

class classificacoesfinanceiras {
    public $id;
    public $descricao;
    public $id_familia;

    function __construct($_id = 0, $_descricao = '', $_id_familia = 0) {
        $this->id = (int)$_id;
        $this->descricao = (string)$_descricao;
        $this->id_familia = (int)$_id_familia;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->descricao = (string)$row['descricao'];
        $this->id_familia = (int)$row['id_familia'];
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
        $arr['id_familia'] = $this->id_familia;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'classificacoesfinanceiras';

    }

}
