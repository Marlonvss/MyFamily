<!--
Classe gerada pelo Gerenciador de Classes da WebLick Sistemas
-->


<?php

class classificacoesfinanceiras {
    public $id;
    public $descricao;

    function __construct($_id = 0, $_descricao = '') {
        $this->id = (int)$_id;
        $this->descricao = (string)$_descricao;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->descricao = (string)$row['descricao'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['descricao'] = '"' . $this->descricao . '"';

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'classificacoesfinanceiras';

    }

}
