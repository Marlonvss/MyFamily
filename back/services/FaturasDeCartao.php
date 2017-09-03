<?php

session_start();

function RefreshFaturaByCartaoMesAno($id_cartao, $mes = 0, $ano = 0) {

    // Se os valores não foram definidos por parâmetro seta os valores da Sessao
    if ($mes == 0) {
        $mes = $_SESSION['mes'];
    }
    if ($ano == 0) {
        $ano = '20' . $_SESSION['ano'];
    }

    // Recupera os dados do cartão
    $cartao = new cartoes($id_cartao);
    $error = $this->GetDAO()->GetByID($cartao);
    if ($error->erro) {
        return $error;
    }

    // Recupera os dados dos itens da fatura
    $error = $this->GetDAOItemFatura()->GetListByCartaoMesAno($cartao->id, $mes, $ano, $listItensFatura);
    if ($error->erro) {
        return $error;
    }

    // Recupera os dados dos itens do cartão by lista de itens por fatura
    $error = $this->GetDAOCartoesItens()->GetListByListFatura($listItensFatura, $listCartaoItens);
    if ($error->erro) {
        return $error;
    }

    // Calcula o valor total dos itens
    $valorTotal = 0;
    $arr = array();
    foreach ($listItensFatura as $itemFatura) {
        $this->LocateIDInList($itemFatura->id_cartao_item, $listCartaoItens, $cartaoItens);
        $arr[$cartaoItens->id_centrocusto] = $arr[$cartaoItens->id_centrocusto] + $itemFatura->valor;
    }

    // ===>  Mudar para "Deletar titulos desse cartão" para sempre criar um novo
    // Recupera os titulos
    $error = $this->GetDAOTitulos()->GetListTituloByCartaoMesAno($cartao->id, $mes, $ano, $listTitulo);
    if ($error->erro) {
        return $error;
    }


    // ===>  Mudar para "Deletar titulos desse cartão" para sempre criar um novo

    //return new CONSTerro(true, implode("|", $arr), __CLASS__, __FUNCTION__);
    // Loop no array de CentroCusto por Valor
    foreach ($arr as $key => $val) {

        // Localiza o titulo com o mesmo CentroCusto
        foreach ($listTitulo as &$obj) {
            if ($obj->id_centrocusto == $key) {
                $titulo = $obj;
                break;
            }
        }

        // Se não encontrou o titulo, então cria um novo
        if ($titulo->id == 0) {
            $titulo = new titulos(0, $cartao->descricao, $ano . '-' . $mes . '-' . $cartao->dia_vencimento, $val, 0, 0, '', $cartao->id_classificacaofinanceira, $key, $cartao->id_familia, $cartao->id);
            $error = $this->GetDAOTitulos()->Add($titulo);
            if ($error->erro) {
                return $error;
            }
        } else {
            $titulo->valor = $val;
            $titulo->id_centrocusto = $key;

            $error = $this->GetDAOTitulos()->Update($titulo);
            if ($error->erro) {
                return $error;
            }
        }
    }
}