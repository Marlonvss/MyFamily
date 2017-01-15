<?php

class usuarios {
    public $id;
    public $email;
    public $senha;
    public $nome;
    public $id_familia;

    function __construct($_id = 0, $_email = '', $_senha = '', $_nome = '', $_id_familia = 0) {
        $this->id = (int)$_id;
        $this->email = (string)$_email;
        $this->senha = (string)$_senha;
        $this->nome = (string)$_nome;
        $this->id_familia = (int)$_id_familia;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->email = (string)$row['email'];
        $this->senha = (string)$row['senha'];
        $this->nome = (string)$row['nome'];
        $this->id_familia = (int)$row['id_familia'];
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
        $arr['email'] = $Separador . $this->email . $Separador;
        $arr['senha'] = $Separador . $this->senha . $Separador;
        $arr['nome'] = $Separador . $this->nome . $Separador;
        $arr['id_familia'] = $this->id_familia;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'usuarios';

    }

}
