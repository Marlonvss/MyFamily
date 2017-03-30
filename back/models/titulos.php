<?php

class titulos {
    public $ID;
    public $Descricao;
    public $Vencimento;
    public $Valor;
    public $ValorPago;
    public $Quitado;
    public $Observacao;
    public $ID_ClassificacaoFinanceira;
    public $ID_CentroCusto;
    public $ID_Familia;

    function __construct($_ID = 0, $_Descricao = '', $_Vencimento = '', $_Valor = 0, $_ValorPago = 0, $_Quitado = '', $_Observacao = '', $_ID_ClassificacaoFinanceira = 0, $_ID_CentroCusto = 0, $_ID_Familia = 0) {
        $this->ID = (int)$_ID;
        $this->Descricao = (string)$_Descricao;
        $this->Vencimento = (string)$_Vencimento;
        $this->Valor = (float)$_Valor;
        $this->ValorPago = (float)$_ValorPago;
        $this->Quitado = (string)$_Quitado;
        $this->Observacao = (string)$_Observacao;
        $this->ID_ClassificacaoFinanceira = (int)$_ID_ClassificacaoFinanceira;
        $this->ID_CentroCusto = (int)$_ID_CentroCusto;
        $this->ID_Familia = (int)$_ID_Familia;
    }

    function RefreshByRow($row) {
        $this->ID = (int)$row['ID'];
        $this->Descricao = (string)$row['Descricao'];
        $this->Vencimento = (string)$row['Vencimento'];
        $this->Valor = (float)$row['Valor'];
        $this->ValorPago = (float)$row['ValorPago'];
        $this->Quitado = (string)$row['Quitado'];
        $this->Observacao = (string)$row['Observacao'];
        $this->ID_ClassificacaoFinanceira = (int)$row['ID_ClassificacaoFinanceira'];
        $this->ID_CentroCusto = (int)$row['ID_CentroCusto'];
        $this->ID_Familia = (int)$row['ID_Familia'];
    }

    // FieldsForCrud
    function getFields($Formatado = true) {
        $arr = array();

        if ($Formatado) {
            $Separador = '"';
        } else {
            $Separador = '';
        }

        $arr['ID'] = $this->ID;
        $arr['Descricao'] = $Separador . $this->Descricao . $Separador;
        $arr['Vencimento'] = $Separador . $this->Vencimento . $Separador;
        $arr['Valor'] = $this->Valor;
        $arr['ValorPago'] = $this->ValorPago;
        $arr['Quitado'] = $Separador . $this->Quitado . $Separador;
        $arr['Observacao'] = $Separador . $this->Observacao . $Separador;
        $arr['ID_ClassificacaoFinanceira'] = $this->ID_ClassificacaoFinanceira;
        $arr['ID_CentroCusto'] = $this->ID_CentroCusto;
        $arr['ID_Familia'] = $this->ID_Familia;

        return $arr;
    }

    // FieldsForCrud
    function getTable() {
        return 'titulos';

    }

}
