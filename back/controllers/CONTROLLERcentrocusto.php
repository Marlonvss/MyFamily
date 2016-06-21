<?php

error_reporting(E_ERROR);

include_once './autoload.php';

class CONTROLLERcentrocusto {

    private function GetDAO() {
        return new DAOcentrocusto();
    }

    function RecuperaByID(&$model) {
        return $this->GetDAO()->GetByID($model);
    }

    function RecuperaLista(&$list, $Where = NULL) {
        $model = new centrocusto();
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
        $model = new centrocusto($id);
        return $this->GetDAO()->Delete($model);
    }

}
