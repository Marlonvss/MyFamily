<?php

class faturas_itens {
    public $id;
    public $id_fatura;
    public $valor;
    public $parcelaatual;
    public $id_itemcartao;

    function __construct($_id = 0, $_id_fatura = 0, $_valor = 0, $_parcelaatual = 0, $_id_itemcartao = 0) {
        $this->id = (int)$_id;
        $this->id_fatura = (int)$_id_fatura;
        $this->valor = (float)$_valor;
        $this->parcelaatual = (int)$_parcelaatual;
        $this->id_itemcartao = (int)$_id_itemcartao;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->id_fatura = (int)$row['id_fatura'];
        $this->valor = (float)$row['valor'];
        $this->parcelaatual = (int)$row['parcelaatual'];
        $this->id_itemcartao = (int)$row['id_itemcartao'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['id_fatura'] = $this->id_fatura;
        $arr['valor'] = $this->valor;
        $arr['parcelaatual'] = $this->parcelaatual;
        $arr['id_itemcartao'] = $this->id_itemcartao;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'faturas_itens';

    }

}
