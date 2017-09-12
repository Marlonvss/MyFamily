<?php

class titulos {
    public $id;
    public $descricao;
    public $vencimento;
    public $valor;
    public $valorpago;
    public $quitado;
    public $observacao;
    public $id_classificacaofinanceira;
    public $id_centrocusto;
    public $id_familia;
    public $id_cartao;
    public $parcela_atual;
    public $parcela_final;
   

    function __construct($_id = 0, $_descricao = '', $_vencimento = '', $_valor = 0, $_valorpago = 0, $_quitado = 0, $_observacao = '', $_id_classificacaofinanceira = 0, $_id_centrocusto = 0, $_id_familia = 0, $_id_cartao = 0, $_parcela_atual = 0, $_parcela_final = 0) {
        $this->id = (int)$_id;
        $this->descricao = (string)$_descricao;
        $this->vencimento = (string)$_vencimento;
        $this->valor = (float)$_valor;
        $this->valorpago = (float)$_valorpago;
        $this->quitado = (int)$_quitado;
        $this->observacao = (string)$_observacao;
        $this->id_classificacaofinanceira = (int)$_id_classificacaofinanceira;
        $this->id_centrocusto = (int)$_id_centrocusto;
        $this->id_familia = (int)$_id_familia;
        $this->id_cartao = (int)$_id_cartao;
        $this->parcela_atual = (int)$_parcela_atual;
        $this->parcela_final = (int)$_parcela_final;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->descricao = (string)$row['descricao'];
        $this->vencimento = (string)$row['vencimento'];
        $this->valor = (float)$row['valor'];
        $this->valorpago = (float)$row['valorpago'];
        $this->quitado = (int)$row['quitado'];
        $this->observacao = (string)$row['observacao'];
        $this->id_classificacaofinanceira = (int)$row['id_classificacaofinanceira'];
        $this->id_centrocusto = (int)$row['id_centrocusto'];
        $this->id_familia = (int)$row['id_familia'];
        $this->id_cartao = (int)$row['id_cartao'];
        $this->parcela_atual = (int)$row['parcela_atual'];
        $this->parcela_final = (int)$row['parcela_final'];
    }

    // FieldsForCrud
    function getFields($Formatado = true) {
        $arr = array();

        if ($Formatado) {
            $Separador = '"';
            $FormatoData = 'Y-m-d';
            $DecimalFormatFrom = ',';
            $DecimalFormatTo = '.';
        } else {
            $Separador = '';
            $FormatoData = 'd/m/Y';
            $DecimalFormatFrom = '.';
            $DecimalFormatTo = ',';
        }

        $arr['id'] = $this->id;
        $arr['descricao'] = $Separador . $this->descricao . $Separador;
        $arr['vencimento'] = $Separador . date($FormatoData, strtotime(str_replace('/', '-', $this->vencimento))) . $Separador;
        $arr['valor'] = str_replace($DecimalFormatFrom, $DecimalFormatTo, $this->valor);
        $arr['valorpago'] = str_replace($DecimalFormatFrom, $DecimalFormatTo, $this->valorpago);
        $arr['quitado'] = $this->quitado;
        $arr['observacao'] = $Separador . $this->observacao . $Separador;
        $arr['id_classificacaofinanceira'] = $this->id_classificacaofinanceira;
        $arr['id_centrocusto'] = $this->id_centrocusto;
        $arr['id_familia'] = $this->id_familia;
        $arr['id_cartao'] = $this->id_cartao;
        $arr['parcela_atual'] = $this->parcela_atual;
        $arr['parcela_final'] = $this->parcela_final;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'titulos';
    }

}
