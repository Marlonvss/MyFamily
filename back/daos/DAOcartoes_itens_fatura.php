<?php

error_reporting(E_ERROR);

include_once './autoload.php';

class DAOcartoes_itens_fatura extends DAObase {

    public function ModelValid($model) {
        return (get_class($model) == 'cartoes_itens_fatura');
    }

}
