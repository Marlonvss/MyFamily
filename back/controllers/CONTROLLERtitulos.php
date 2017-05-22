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
        $model = new titulos($id);
        return $this->GetDAO()->Delete($model);
    }

    function RecuperaListaMeusTitulosCorrente(&$list) {
        $model = new titulos();

        $Where = ' where YEAR(vencimento) = 20' . $_SESSION['ano']
                . ' and Month(vencimento) = ' . $_SESSION['mes']
                . ' and id_familia = ' . unserialize($_SESSION['userLogged'])->id_familia
                . ' and not exists (select 1 from centroscustos where centroscustos.id = titulos.id_centrocusto and centroscustos.controladespesa = 0)';
        return $this->GetDAO()->GetList($model, $list, $Where);
    }

    function RecuperaListaOutrosTitulosCorrente(&$list) {
        $model = new titulos();

        $Where = ' where YEAR(vencimento) = 20' . $_SESSION['ano']
                . ' and Month(vencimento) = ' . $_SESSION['mes']
                . ' and id_familia = ' . unserialize($_SESSION['userLogged'])->id_familia
                . ' and exists (select 1 from centroscustos where centroscustos.id = titulos.id_centrocusto and centroscustos.controladespesa = 0)';
        return $this->GetDAO()->GetList($model, $list, $Where);
    }

}
