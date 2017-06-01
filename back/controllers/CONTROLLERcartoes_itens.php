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

    private function GetCONTROLLERCartao() {
        return new CONTROLLERcartoes();
    }

    private function GetDAOCartoes() {
        return new DAOcartoes();
    }

    function RecuperaByID(&$model) {
        //return 
        return $this->GetDAO()->GetByID($model);
        //return new CONSTerro(true, $model, __CLASS__, __FUNCTION__);
    }

    function RecuperaLista(&$list, $Where = NULL) {
        $model = new cartoes_itens();
        return $this->GetDAO()->GetList($model, $list, $Where);
    }

    function Save(&$model) {

        // Recupera o cartão do item...
        $cartao = new cartoes($model->id_cartao);
        $erro = $this->GetDAOCartoes()->GetByID($cartao);
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
            $erro = $this->GetDAOItemFatura()->DeleteFromItem($model);
            if ($erro->erro) {
                return $erro;
            }
        }

        // Formata para o primeiro dia e aplica regra de negócio para salvar os itens da fatura
        $MesBase = date('Y-m-01', strtotime(str_replace('/', '-', $model->datacompra)));

        $MesBase = date('Y-m-d', strtotime("+1 months", strtotime($MesBase)));
        if ($model->mes_fatura_inicio == "1") {
            $MesBase = date('Y-m-d', strtotime("+1 months", strtotime($MesBase)));
        };
        $Mes = date('m', strtotime($MesBase));
        $Ano = date('Y', strtotime($MesBase));

        // Se Parcelas for = 0 significa que o item é parcelamento fixo...
        if ($model->parcelas > 0) {
            for ($i = 1; $i <= $model->parcelas; $i++) {
                $itemFatura = new cartoes_itens_fatura(0, $model->id, $Mes, $Ano, $i, $model->parcelas, $model->valor);
                $erro = $this->GetDAOItemFatura()->Add($itemFatura);
                if ($erro->erro) {
                    return $erro;
                } else {
                    $erro = $this->GetCONTROLLERCartao()->RefreshFaturaByCartaoMesAno($cartao->id, $Mes, $Ano);
                    if ($erro->erro) {
                        return $erro;
                    }
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
        $erro = $this->GetDAOItemFatura()->DeleteFromItem($model);
        if ($erro->erro) {
            return $erro;
        } else {
            $erro = $this->GetDAO()->Delete($model);
            if ($erro->erro) {
                return $erro;
            } else {

                $Mes = date('m', strtotime($model->datacompra));
                $Ano = date('Y', strtotime($model->datacompra));

                $erro = $this->GetCONTROLLERCartao()->RefreshFaturaByCartaoMesAno($model->id_cartao, $Mes, $Ano);
                if ($erro->erro) {
                    return $erro;
                }
            }
        }
    }

    function RecuperaListaFaturaCorrente(&$list) {
        $model = new cartoes_itens_fatura();
        $Where = ' where ano_fatura = 20' . $_SESSION['ano'] . ' and mes_fatura = ' . $_SESSION['mes'];
        return $this->GetDAOItemFatura()->GetList($model, $list, $Where);
    }

}
