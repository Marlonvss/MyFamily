<?php

class cartoes_itens {
    public $id;
    public $id_cartao;
    public $datacompra;
    public $descricao;
    public $valor;
    public $parcelas;
    public $id_centrocusto;

    function __construct($_id = 0, $_id_cartao = 0, $_datacompra = '', $_descricao = '', $_valor = 0, $_parcelas = 0, $_id_centrocusto = 0) {
        $this->id = (int)$_id;
        $this->id_cartao = (int)$_id_cartao;
        $this->datacompra = (string)$_datacompra;
        $this->descricao = (string)$_descricao;
        $this->valor = (float)$_valor;
        $this->parcelas = (int)$_parcelas;
        $this->id_centrocusto = (int)$_id_centrocusto;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->id_cartao = (int)$row['id_cartao'];
        $this->datacompra = (string)$row['datacompra'];
        $this->descricao = (string)$row['descricao'];
        $this->valor = (float)$row['valor'];
        $this->parcelas = (int)$row['parcelas'];
        $this->id_centrocusto = (int)$row['id_centrocusto'];
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
        $arr['id_cartao'] = $this->id_cartao;
        $arr['datacompra'] = $Separador . $this->datacompra . $Separador;
        $arr['descricao'] = $Separador . $this->descricao . $Separador;
        $arr['valor'] = $this->valor;
        $arr['parcelas'] = $this->parcelas;
        $arr['id_centrocusto'] = $this->id_centrocusto;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'cartoes_itens';

    }

}
