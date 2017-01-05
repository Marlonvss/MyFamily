<!--
Classe gerada pelo Gerenciador de Classes da WebLick Sistemas
-->


<?php

class baixas {
    public $id;
    public $id_rateio;
    public $valor;
    public $data;

    function __construct($_id = 0, $_id_rateio = 0, $_valor = 0, $_data = '') {
        $this->id = (int)$_id;
        $this->id_rateio = (int)$_id_rateio;
        $this->valor = (float)$_valor;
        $this->data = (string)$_data;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->id_rateio = (int)$row['id_rateio'];
        $this->valor = (float)$row['valor'];
        $this->data = (string)$row['data'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['id_rateio'] = $this->id_rateio;
        $arr['valor'] = $this->valor;
        $arr['data'] = '"' . $this->data . '"';

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'baixas';

    }

}
