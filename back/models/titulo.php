<?php

class titulo {

    private $memento;

    public $id;
    public $id_pessoa;
    public $valor;
    public $vencimento;
    public $parcela_atual;
    public $parcela_final;
    public $sinal;
    public $observacao;
    public $situacao;

    function __construct($_id = 0, $_id_pessoa = 0, $_valor = 0, $_vencimento = '', $_parcela_atual = 0, $_parcela_final = 0, $_sinal = 0, $_observacao = '', $_situacao = 0) {
        $this->id = (int) $_id;
        $this->id_pessoa = (int) $_id_pessoa;
        $this->valor = (int) $_valor;
        $this->vencimento = (string) $_vencimento;
        $this->parcela_atual = (int) $_parcela_atual;
        $this->parcela_final = (int) $_parcela_final;
        $this->sinal = (int) $_sinal;
        $this->observacao = (string) $_observacao;
        $this->situacao = (int) $_situacao;
    }
    
    function SaveMemento() {
        if (isset($memento)) {
            unset($memento);
        }
        $memento = new titulo($this->id, $this->id_pessoa, $this->valor, $this->vencimento, $this->parcela_atual, $this->parcela_final, $this->sinal, $this->observacao, $this->situacao);
    }

    function GetMemento() {
        if (isset($memento)) {
            return $memento;
        }
    }

    function RefreshByRow($row){
        $this->id = $row['id'];
        $this->id_pessoa = $row['id_pessoa'];
        $this->valor = $row['valor'];
        $this->vencimento = $row['vencimento'];
        $this->parcela_atual = $row['parcela_atual'];
        $this->parcela_final = $row['parcela_final'];
        $this->sinal = $row['sinal'];
        $this->observacao = $row['observacao'];
        $this->situacao = $row['situacao'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['id_pessoa'] = $this->id_pessoa;
        $arr['valor'] = $this->valor;
        $arr['vencimento'] = '"'. $this->vencimento .'"';
        $arr['parcela_atual'] = $this->parcela_atual;
        $arr['parcela_final'] = $this->parcela_final;
        $arr['sinal'] = $this->sinal;
        $arr['observacao'] = '"'.$this->observacao.'"';
        $arr['situacao'] = $this->situacao;
        
        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'titulos';
    }

}
