<?php

class cartoes_itens {
    public $id;
    public $id_cartao;
    public $datacompra;
    public $descricao;
    public $valor;
    public $parcelas;
    public $id_centrocusto;
    public $id_classificacaofinanceira;

    //Campo virtual...
    public $mes_fatura_inicio;

    function __construct($_id = 0, $_id_cartao = 0, $_datacompra = '', $_descricao = '', $_valor = 0, $_parcelas = 0, $_id_centrocusto = 0, $_id_classificacaofinanceira = 0) {
        $this->id = (int)$_id;
        $this->id_cartao = (int)$_id_cartao;
        $this->datacompra = (string)$_datacompra;
        $this->descricao = (string)$_descricao;
        $this->valor = (float)$_valor;
        $this->parcelas = (int)$_parcelas;
        $this->id_centrocusto = (int)$_id_centrocusto;
        $this->id_classificacaofinanceira = (int)$_id_classificacaofinanceira;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->id_cartao = (int)$row['id_cartao'];
        $this->datacompra = (string)$row['datacompra'];
        $this->descricao = (string)$row['descricao'];
        $this->valor = (float)$row['valor'];
        $this->parcelas = (int)$row['parcelas'];
        $this->id_centrocusto = (int)$row['id_centrocusto'];
        $this->id_classificacaofinanceira = (int)$row['id_classificacaofinanceira'];
    }

    // FieldsForCrud
    function getFields($Formatado = true) {
        $arr = array();

        if ($Formatado) {
            $Separador = '"';
            $FormatoData = 'Y-m-d';
        } else {
            $Separador = '';
            $FormatoData = 'd/m/Y';
        }

        $arr['id'] = $this->id;
        $arr['id_cartao'] = $this->id_cartao;
        $arr['datacompra'] = $Separador . date($FormatoData, strtotime(str_replace('/', '-', $this->datacompra))) . $Separador;
        $arr['descricao'] = $Separador . $this->descricao . $Separador;
        $arr['valor'] = $this->valor;
        $arr['parcelas'] = $this->parcelas;
        $arr['id_centrocusto'] = $this->id_centrocusto;
        $arr['id_classificacaofinanceira'] = $this->id_classificacaofinanceira;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'cartoes_itens';

    }

}
