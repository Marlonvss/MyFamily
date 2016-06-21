<?php

error_reporting(E_ERROR);

include_once './autoload.php';

class DAOfatura_item extends DAObase {

    public function ModelValid($model) {
        return (get_class($model) == 'fatura_item');
    }

}
