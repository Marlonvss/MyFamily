<?php

error_reporting(E_ERROR);

include_once './autoload.php';

class DAOtitulos extends DAObase {

    public function ModelValid($model) {
        return (get_class($model) == 'titulos');
    }

    public function GetTituloByCartaoMesAno($id_cartao, $mes, $ano, &$model) {
        $model = new titulos();
        $Where = ' where YEAR(vencimento) = ' . $ano .
                '   and Month(vencimento) = ' . $mes .
                '   and id_cartao = ' . $id_cartao;
        $error = $this->GetList($model, $list, $Where);
        if ($error->erro) {
            return $error;
        }
        if (!empty($list)) {
            $model = array_shift($list);
        }
    }

}
