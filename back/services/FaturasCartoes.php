<?php

session_start();

class ServiceFaturasCartoes {
    function nome(){
        return 'marlon';
    }

    function RefreshFaturaByCartaoMesAno($id_cartao = 0, $mes = 0, $ano = 0) {

        return 'chamou, isso q importa!';

        // Se os valores não foram definidos por parâmetro seta os valores da Sessao
        if ($mes == 0) {
            $mes = $_SESSION['mes'];
        }
        if ($ano == 0) {
            $ano = '20' . $_SESSION['ano'];
        }

        // Instancia todos os controllers
        $ControllCartao = new CONTROLLERcartoes();
        $ControllItens = new CONTROLLERcartoes_itens();    

        // Recupera os dados do cartão
        if ($id_cartao == 0) {
            $error = $ControllCartao->RecuperaLista($listaCartoes);
            if ($error->erro) {
                return $error;
            }
        } else {
            $listaCartoes = array();
            $cartao = new cartoes();
            $error = $ControllCartao->RecuperaLista($cartao);
            if ($error->erro) {
                return $error;
            }
            $listaCartoes[0] = $cartao;
        }

        echo 'Opa!';

        // Recupera os dados dos itens da fatura por Cartão/Mês/Ano
        $error = $this->GetDAOItemFatura()->GetListByCartaoMesAno($id_cartao, $mes, $ano, $listItensFatura);
        if ($error->erro) {
            return $error;
        }

        // Recupera os dados dos itens do cartão by lista de itens por fatura
        $error = $this->GetDAOCartoesItens()->GetListByListFatura($listItensFatura, $listCartaoItens);
        if ($error->erro) {
            return $error;
        }


        foreach ($listItensFatura as $itemFatura) {

        }

        //////////////////////////////////////
        Separar ParValor (Cartão / ValorTotal)
        Setar ClassFin do cartão
        Setar Centro Custo default da Familia
        //////////////////////////////////////

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
}