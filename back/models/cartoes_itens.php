<?php

class cartoes_itens {
    public $id;
    public $descricao;
    public $valor;
    public $datacompra;
    public $parcelas;
    public $id_cartao;

    function __construct($_id = 0, $_descricao = '', $_valor = 0, $_datacompra = '', $_parcelas = 0, $_id_cartao = 0) {
        $this->id = (int)$_id;
        $this->descricao = (string)$_descricao;
        $this->valor = (double)$_valor;
        $this->datacompra = (string)$_datacompra;
        $this->parcelas = (int)$_parcelas;
        $this->id_cartao = (int)$_id_cartao;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->descricao = (string)$row['descricao'];
        $this->valor = (double)$row['valor'];
        $this->datacompra = (string)$row['datacompra'];
        $this->parcelas = (int)$row['parcelas'];
        $this->id_cartao = (int)$row['id_cartao'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['descricao'] = '"' . $this->descricao . '"';
        $arr['valor'] = $this->valor;
        $arr['datacompra'] = '"' . $this->datacompra . '"';
        $arr['parcelas'] = $this->parcelas;
        $arr['id_cartao'] = $this->id_cartao;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'cartoes_itens';

    }

}
