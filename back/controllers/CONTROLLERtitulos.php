<!--
CONTROLLER gerado pelo Gerenciador da WebLick Sistemas
-->


<?php

error_reporting(E_ERROR);

include_once './autoload.php';

class CONTROLLERtitulos extends CONTROLLERbase {

    private function GetDAO() {
        return new DAOtitulos();
    }

    function RecuperaByID(&$model) {
        return $this->GetDAO()->GetByID($model);
    }

    function RecuperaLista(&$list, $Where = NULL) {
        $model = new titulos();
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
        $model = new titulos($id);
        return $this->GetDAO()->Delete($model);
    }

    function RecuperaByFaturaID($fatura_id, &$model) {
        $fatura = new fatura($fatura_id);
        $DAOFatura = new DAOfatura();

        $erro = $DAOFatura->GetByID($fatura);
        if ($erro->erro) {
            return $erro;
        } else {
            $model->id = $fatura->id_titulo;
            return $this->GetDAO()->GetByID($model);
        }
    }

    function AtualizaTituloDeFatura($fatura_id) {
        return $this->GetDAO()->RefreshTituloDeFatura($fatura_id);
    }

    function RecuperaListaPagar(&$list, $Where = NULL) {
        $model = new titulos();
        if ($Where == NULL) {
            $Where = ' where sinal = 0';
        } else {
            $Where = $Where + ' and sinal = 0';
        }
        return $this->GetDAO()->GetList($model, $list, $Where);
    }

    function RecuperaListaReceber(&$list, $Where = NULL) {
        $model = new titulos();
        if ($Where == NULL) {
            $Where = ' where sinal = 1';
        } else {
            $Where = $Where + ' and sinal = 1';
        }
        return $this->GetDAO()->GetList($model, $list, $Where);
    }

}
