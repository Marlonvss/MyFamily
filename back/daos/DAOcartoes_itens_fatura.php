<?php

error_reporting(E_ERROR);

include_once './autoload.php';

class DAOcartoes_itens_fatura extends DAObase {

    public function ModelValid($model) {
        return (get_class($model) == 'cartoes_itens_fatura');
    }

    public function GetListByCartaoMesAno($id_cartao, $mes, $ano, &$list, $cartaoID) {

        $Where = ' where exists (select 1 from cartoes_itens where cartoes_itens.id = cartoes_itens_fatura.id_cartao_item and cartoes_itens.id_cartao = ' . $id_cartao . ') ' .
                ' and mes_fatura = ' . $mes .
                ' and ano_fatura = ' . $ano;

        $model = new cartoes_itens_fatura();
        return $this->GetList($model, $list, $Where);
    }

}
