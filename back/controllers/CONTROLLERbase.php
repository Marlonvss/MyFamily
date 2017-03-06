<?php

error_reporting(E_ERROR);

include_once './autoload.php';

class CONTROLLERbase {

    function LocateIDInList($ID, $List, &$model) {
        if ($ID <> 0) {
            foreach ($List as &$obj) {
                if ($obj->id == $ID) {
                    $model = $obj;
                    break;
                }
            }
        }
    }

}
