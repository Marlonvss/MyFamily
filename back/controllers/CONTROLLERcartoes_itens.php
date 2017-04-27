<?php

error_reporting(E_ERROR);
session_start();

include_once './autoload.php';

class CONTROLLERcartoes_itens extends CONTROLLERbase {

    private function GetDAO() {
        return new DAOcartoes_itens();
    }

    private function GetDAOItemFatura() {
        return new DAOcartoes_itens_fatura();
    }

    function RecuperaByID(&$model) {
        return $this->GetDAO()->GetByID($model);
    }

    function RecuperaLista(&$list, $Where = NULL) {
        $model = new cartoes_itens();
        return $this->GetDAO()->GetList($model, $list, $Where);
    }

    function Save(&$model) {
        $DAOcartoes_itens_fatura = new DAOcartoes_itens_fatura();
        $DAOcartoes = new DAOcartoes();

        // Recupera o cartão do item...
        $cartao = new cartoes();
        $cartao->id = $model->id_cartao;
        $erro = $DAOcartoes->GetByID($cartao);
        if ($erro->erro) {
            return $erro;
        }
        
        // Salva o item
        if ($model->id == 0) {
            $erro = $this->GetDAO()->Add($model);
            if ($erro->erro) {
                return $erro;
            }
        } else {
            $erro = $this->GetDAO()->Update($model);
            if ($erro->erro) {
                return $erro;
            }
            $erro = $DAOcartoes_itens_fatura->DeleteFromItem($model);
            if ($erro->erro) {
                return $erro;
            }
        }

        // Aplica regra de negócio para salvar os itens da fatura
        // mes_fatura_inicio
        $MesBase = date('Y-m-d', strtotime(str_replace('/', '-', $model->datacompra)));
        if ($model->mes_fatura_inicio == "1") {
            $MesBase = date('Y-m-d', strtotime("+1 months", strtotime($MesBase)));
        };
        $Mes = date('m', strtotime($MesBase));
        $Ano = date('Y', strtotime($MesBase));

        if ($model->parcelas > 0) { // Se Parcelas for = 0 significa que o item é parcelamento fixo...
            for ($i = 1; $i <= $model->parcelas; $i++) {
                $itemFatura = new cartoes_itens_fatura(0, $model->id, $Mes, $Ano, $i, $model->parcelas, $model->valor);
                $erro = $DAOcartoes_itens_fatura->Add($itemFatura);
                if ($erro->erro) {
                    return $erro;
                }

                // Avança um mês para gravar o próximo registro...
                $MesBase = date('Y-m-d', strtotime("+1 months", strtotime($MesBase)));
                $Mes = date('m', strtotime($MesBase));
                $Ano = date('Y', strtotime($MesBase));
            }
        }
    }

    function Remove($id) {
        $model = new cartoes_itens($id);
        return $this->GetDAO()->Delete($model);
    }

    function RecuperaListaFaturaCorrente(&$list) {
        $model = new cartoes_itens_fatura();
        $Where = ' where ano_fatura = 20' . $_SESSION['ano'] . ' and mes_fatura = ' . $_SESSION['mes'];
        return $this->GetDAOItemFatura()->GetList($model, $list, $Where);
    }

}
