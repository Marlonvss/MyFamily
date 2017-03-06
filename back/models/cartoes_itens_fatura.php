<?php

class cartoes_itens_fatura {
    public $id;
    public $id_cartao_item;
    public $mes_fatura;
    public $ano_fatura;
    public $parcela_atual;
    public $parcela_final;
    public $valor;

    function __construct($_id = 0, $_id_cartao_item = 0, $_mes_fatura = 0, $_ano_fatura = 0, $_parcela_atual = 0, $_parcela_final = '', $_valor = 0) {
        $this->id = (int)$_id;
        $this->id_cartao_item = (int)$_id_cartao_item;
        $this->mes_fatura = (int)$_mes_fatura;
        $this->ano_fatura = (int)$_ano_fatura;
        $this->parcela_atual = (int)$_parcela_atual;
        $this->parcela_final = (string)$_parcela_final;
        $this->valor = (int)$_valor;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->id_cartao_item = (int)$row['id_cartao_item'];
        $this->mes_fatura = (int)$row['mes_fatura'];
        $this->ano_fatura = (int)$row['ano_fatura'];
        $this->parcela_atual = (int)$row['parcela_atual'];
        $this->parcela_final = (string)$row['parcela_final'];
        $this->valor = (int)$row['valor'];
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
        $arr['id_cartao_item'] = $this->id_cartao_item;
        $arr['mes_fatura'] = $this->mes_fatura;
        $arr['ano_fatura'] = $this->ano_fatura;
        $arr['parcela_atual'] = $this->parcela_atual;
        $arr['parcela_final'] = $Separador . $this->parcela_final . $Separador;
        $arr['valor'] = $this->valor;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'cartoes_itens_fatura';

    }

}
