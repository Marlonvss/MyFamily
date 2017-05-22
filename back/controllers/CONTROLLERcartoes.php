<?php

error_reporting(E_ERROR);

include_once './autoload.php';

class CONTROLLERcartoes extends CONTROLLERbase {

    private function GetDAO() {
        return new DAOcartoes();
    }

    private function GetDAOItemFatura() {
        return new DAOcartoes_itens_fatura();
    }

    private function GetDAOTitulos() {
        return new DAOtitulos();
    }

    function RecuperaByID(&$model) {
        return $this->GetDAO()->GetByID($model);
    }

    function RecuperaLista(&$list, $Where = NULL) {
        $model = new cartoes();

        if ($Where == NULL) {
            $Where = 'where id_familia = ' . unserialize($_SESSION['userLogged'])->id_familia;
        } else {
            $Where = $Where . ' and id_familia = ' . unserialize($_SESSION['userLogged'])->id_familia;
        }
        return $this->GetDAO()->GetList($model, $list, $Where);
    }

    function Save(&$model) {
        if ($model->id == 0) {
            return $this->GetDAO()->Add($model);
        } else {
            return $this->GetDAO()->Update($model);
        }
    }

    function Remove($id) {
        $model = new cartoes($id);
        return $this->GetDAO()->Delete($model);
    }

    function RefreshFaturaByCartaoMesAno($id_cartao, $mes = 0, $ano = 0) {

        if ($mes == 0) {
            $mes = $_SESSION['mes'];
        }
        if ($ano == 0) {
            $ano = '20' . $_SESSION['ano'];
        }

        // Recupera os dados do cartão
        $model = new cartoes($id_cartao);
        $error = $this->GetDAO()->GetByID($model);
        if ($error->erro) {
            return $error;
        }

        // Recupera os dados dos itens do cartão
        $error = $this->GetDAOItemFatura()->GetListByCartaoMesAno($model->id, $mes, $ano, $list);
        if ($error->erro) {
            return $error;
        }

        // Calcula o valor total dos itens
        $valorTotal = 0;
        foreach ($list as $item) {
            $valorTotal = $valorTotal + $item->valor;
        }

        // Recupera os dados do título (se existir)
        $Titulo = new titulos();
        $error = $this->GetDAOTitulos()->GetTituloByCartaoMesAno($model->id, $mes, $ano, $Titulo);
        if ($error->erro) {
            return $error;
        }

        if ($Titulo->id == 0) {
            $Titulo = new titulos(0, $model->descricao, $ano . '-' . $mes . '-' . $model->dia_vencimento, $valorTotal, 0, 0, '', 0, 0, $model->id_familia, $model->id);

            $error = $this->GetDAOTitulos()->Add($Titulo);
            if ($error->erro) {
                return $error;
            }
        } else {
            $Titulo->valor = $valorTotal;

            $error = $this->GetDAOTitulos()->Update($Titulo);
            if ($error->erro) {
                return $error;
            }
        }
    }

}
