<!--
DAO gerada pelo Gerenciador da WebLick Sistemas
-->


<?php

error_reporting(E_ERROR);

include_once './autoload.php';

class DAOcentroscustos extends DAObase {

    public function ModelValid($model) {
        return (get_class($model) == 'centroscustos');
    }

}
