<?php

class centroscustos {
    public $id;
    public $descricao;
    public $controladespesa;
    public $id_familia;

    function __construct($_id = 0, $_descricao = '', $_controladespesa = '', $_id_familia = 0) {
        $this->id = (int)$_id;
        $this->descricao = (string)$_descricao;
        $this->controladespesa = (string)$_controladespesa;
        $this->id_familia = (int)$_id_familia;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->descricao = (string)$row['descricao'];
        $this->controladespesa = (string)$row['controladespesa'];
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
        $arr['controladespesa'] = $Separador . $this->controladespesa . $Separador;
        $arr['id_familia'] = $this->id_familia;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'centroscustos';

    }

}
