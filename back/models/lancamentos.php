<?php

class lancamentos {
    public $id;
    public $descricao;
    public $data;
    public $valor;
    public $sinal;
    public $id_classificacaofinanceira;
    public $id_centrocusto;
    public $id_familia;
    public $id_titulo;

    function __construct($_id = 0, $_descricao = '', $_data = '', $_valor = 0, $_sinal = 0, $_id_classificacaofinanceira = 0, $_id_centrocusto = 0, $_id_familia = 0, $_id_titulo = 0) {
        $this->id = (int)$_id;
        $this->descricao = (string)$_descricao;
        $this->data = (string)$_data;
        $this->valor = (float)$_valor;
        $this->sinal = (int)$_sinal;
        $this->id_classificacaofinanceira = (int)$_id_classificacaofinanceira;
        $this->id_centrocusto = (int)$_id_centrocusto;
        $this->id_familia = (int)$_id_familia;
        $this->id_titulo = (int)$_id_titulo;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->descricao = (string)$row['descricao'];
        $this->data = (string)$row['data'];
        $this->valor = (float)$row['valor'];
        $this->sinal = (int)$row['sinal'];
        $this->id_classificacaofinanceira = (int)$row['id_classificacaofinanceira'];
        $this->id_centrocusto = (int)$row['id_centrocusto'];
        $this->id_familia = (int)$row['id_familia'];
        $this->id_titulo = (int)$row['id_titulo'];
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
        $arr['descricao'] = $Separador . $this->descricao . $Separador;
        $arr['data'] = $Separador . date($FormatoData, strtotime(str_replace('/', '-', $this->data))) . $Separador;
        $arr['valor'] = $this->valor;
        $arr['sinal'] = $this->sinal;
        $arr['id_classificacaofinanceira'] = $this->id_classificacaofinanceira;
        $arr['id_centrocusto'] = $this->id_centrocusto;
        $arr['id_familia'] = $this->id_familia;
        $arr['id_titulo'] = $this->id_titulo;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'lancamentos';

    }

}
