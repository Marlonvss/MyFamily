<?php

error_reporting(E_ERROR);

include_once './autoload.php';

class DAOcartoes_itens extends DAObase {

    public function ModelValid($model) {
        return (get_class($model) == 'cartoes_itens');
    }

    public function GetListByListFatura($listItensFatura, &$list) {

        $ids = '0';
        foreach ($listItensFatura as $value) {
            $ids = $ids . ', '.$value->id_cartao_item;
        }
        
        $Where = ' where id in (' . $ids . ') ';

        $model = new cartoes_itens();
        return $this->GetList($model, $list, $Where);
    }

}
