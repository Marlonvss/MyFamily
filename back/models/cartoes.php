<?php

class cartoes {
    public $id;
    public $descricao;
    public $numero;
    public $limite;
    public $dia_fechamento;
    public $dia_vencimento;
    public $id_familia;

    function __construct($_id = 0, $_descricao = '', $_numero = 0, $_limite = 0, $_dia_fechamento = 0, $_dia_vencimento = 0, $_id_familia = 0) {
        $this->id = (int)$_id;
        $this->descricao = (string)$_descricao;
        $this->numero = (int)$_numero;
        $this->limite = (float)$_limite;
        $this->dia_fechamento = (int)$_dia_fechamento;
        $this->dia_vencimento = (int)$_dia_vencimento;
        $this->id_familia = (int)$_id_familia;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->descricao = (string)$row['descricao'];
        $this->numero = (int)$row['numero'];
        $this->limite = (float)$row['limite'];
        $this->dia_fechamento = (int)$row['dia_fechamento'];
        $this->dia_vencimento = (int)$row['dia_vencimento'];
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
        $arr['numero'] = $this->numero;
        $arr['limite'] = $this->limite;
        $arr['dia_fechamento'] = $this->dia_fechamento;
        $arr['dia_vencimento'] = $this->dia_vencimento;
        $arr['id_familia'] = $this->id_familia;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'cartoes';

    }

}
