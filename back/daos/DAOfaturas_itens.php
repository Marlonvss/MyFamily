<?php

error_reporting(E_ERROR);

include_once './autoload.php';

class DAOfaturas_itens extends DAObase {

    public function ModelValid($model) {
        return (get_class($model) == 'faturas_itens');
    }

}
