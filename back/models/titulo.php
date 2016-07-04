<?php

class titulo {

    private $memento;

    public $id;
    public $pessoa;
    public $valor;
    public $vencimento;
    public $parcela_atual;
    public $parcela_final;
    public $sinal;
    public $observacao;
    public $situacao;

    function __construct($_id = 0, $_pessoa = '', $_valor = 0, $_vencimento = '', $_parcela_atual = 0, $_parcela_final = 0, $_sinal = 0, $_observacao = '', $_situacao = 0) {
        $this->id = (int) $_id;
        $this->pessoa = (string) $_pessoa;
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
        $memento = new titulo($this->id, $this->pessoa, $this->valor, $this->vencimento, $this->parcela_atual, $this->parcela_final, $this->sinal, $this->observacao, $this->situacao);
    }

    function GetMemento() {
        if (isset($memento)) {
            return $memento;
        }
    }

    function RefreshByRow($row){
        $this->id = $row['id'];
        $this->pessoa = $row['pessoa'];
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
        $arr['pessoa'] = '"'. $this->pessoa .'"';
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

    
    //
    function getSituacaoTexto(){
        switch ($this->situacao){
            case 0: {return 'Aberto'; break;}
            case 1: {return 'Quitado'; break;}
            case 2: {return 'Em débito'; break;}
        }        
    }
    
}
