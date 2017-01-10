<?php

class titulos {
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
        $this->id = (int)$_id;
        $this->pessoa = (string)$_pessoa;
        $this->valor = (float)$_valor;
        $this->vencimento = (string)$_vencimento;
        $this->parcela_atual = (int)$_parcela_atual;
        $this->parcela_final = (int)$_parcela_final;
        $this->sinal = (int)$_sinal;
        $this->observacao = (string)$_observacao;
        $this->situacao = (int)$_situacao;
    }

    function RefreshByRow($row) {
        $this->id = (int)$row['id'];
        $this->pessoa = (string)$row['pessoa'];
        $this->valor = (float)$row['valor'];
        $this->vencimento = (string)$row['vencimento'];
        $this->parcela_atual = (int)$row['parcela_atual'];
        $this->parcela_final = (int)$row['parcela_final'];
        $this->sinal = (int)$row['sinal'];
        $this->observacao = (string)$row['observacao'];
        $this->situacao = (int)$row['situacao'];
    }

    // FieldsForCrud
    function getFields() {
        $arr = array();

        $arr['id'] = $this->id;
        $arr['pessoa'] = '"' . $this->pessoa . '"';
        $arr['valor'] = $this->valor;
        $arr['vencimento'] = '"' . $this->vencimento . '"';
        $arr['parcela_atual'] = $this->parcela_atual;
        $arr['parcela_final'] = $this->parcela_final;
        $arr['sinal'] = $this->sinal;
        $arr['observacao'] = '"' . $this->observacao . '"';
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
            case 2: {return 'Em d�bito'; break;}
        }        
    }
    
}
