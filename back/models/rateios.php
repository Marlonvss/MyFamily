<?php

class rateios {
    public $id;
    public $id_centrocusto;
    public $id_classificacao;
    public $id_titulo;
    public $valor;
    public $descricao;

    function __construct($_id = 0, $_id_centrocusto = 0, $_id_classificacao = 0, $_id_titulo = 0, $_valor = 0, $_descricao = '') {
        $this->id = (int)$_id;
        $this->id_centrocusto = (int)$_id_centrocusto;
        $this->id_classificacao = (int)$_id_classificacao;
        $this->id_titulo = (int)$_id_titulo;
        $this->valor = (float)$_valor;
        $this->descricao = (string)$_descricao;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->id_centrocusto = (int)$row['id_centrocusto'];
        $this->id_classificacao = (int)$row['id_classificacao'];
        $this->id_titulo = (int)$row['id_titulo'];
        $this->valor = (float)$row['valor'];
        $this->descricao = (string)$row['descricao'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['id_centrocusto'] = $this->id_centrocusto;
        $arr['id_classificacao'] = $this->id_classificacao;
        $arr['id_titulo'] = $this->id_titulo;
        $arr['valor'] = $this->valor;
        $arr['descricao'] = '"' . $this->descricao . '"';

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'rateios';

    }

}
