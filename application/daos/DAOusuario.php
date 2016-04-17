<?php

error_reporting(E_ERROR);

include_once './autoload.php';

include_once '../conexao.php';
include_once './conexao.php';

Conecta();

class DAOusuario {

    private function ModelValid($model) {
        return (get_class($model) == 'usuario');
    }

    function GetByID(&$model) {

        if ($this->ModelValid($model)) {

            $Ar = $model->getArray();
            $Fields = '';
            foreach ($Ar as $key => $val) {
                if ($Fields == '') {
                    $Fields = $key;
                } else {
                    $Fields = $Fields . ', ' . $key;
                }
            }

            $strsql = 'SELECT ' . $Fields
                    . '  FROM ' . $model->getTable()
                    . ' WHERE ID = ' . $model->id
                    . ' ORDER BY ID ';
            $rs = mysql_query($strsql);

            if (!$rs) {
                return new CONSTerro(true, mysql_error(), __CLASS__, __FUNCTION__);
            } else {
                while ($row = mysql_fetch_array($rs)) {
                    $model->RefreshByRow($row);
                    break;
                }
                return new CONSTerro(false, '', __CLASS__, __FUNCTION__);
            }
        }
    }

    function GetList($model, &$list, $Where = NULL) {

        if ($this->ModelValid($model)) {
            $Ar = $model->getArray();
            $Fields = '';
            foreach ($Ar as $key => $val) {
                if ($Fields == '') {
                    $Fields = $key;
                } else {
                    $Fields = $Fields . ', ' . $key;
                }
            }

            $strsql = 'SELECT ' . $Fields
                    . '  FROM ' . $model->getTable()
                    . $Where
                    . ' ORDER BY ID ';
            $rs = mysql_query($strsql);

            if (!$rs) {
                return new CONSTerro(true, mysql_error(), __CLASS__, __FUNCTION__);
            } else {

                // Cria ARRAY
                $list = array();
                $i = 0;

                // Loop pelo RecordSet
                while ($row = mysql_fetch_array($rs)) {
                    $model->RefreshByRow($row);
                    $list[$i] = clone $model;
                    $i++;
                }
                return new CONSTerro(false, '', __CLASS__, __FUNCTION__);
            }
        } else {
            return new CONSTerro(true, 'Modelo inválido!', __CLASS__, __FUNCTION__);
        }
    }

    function Add(&$model) {

        if ($this->ModelValid($model)) {
            $Ar = $model->getArray();
            $Fields = '';
            $Values = '';
            foreach ($Ar as $key => $val) {
                if ($key <> 'id') {
                    if ($Fields == '') {
                        $Fields = $key;
                    } else {
                        $Fields = $Fields . ', ' . $key;
                    }

                    if ($Values == '') {
                        $Values = $val;
                    } else {
                        $Values = $Values . ', ' . $val;
                    }
                }
            }

            $strsql = 'insert into ' . $model->getTable() . ' ( ' . $Fields . ' ) '
                    . 'values (' . $Values . ')';
            if (!mysql_query($strsql)) {
                return new CONSTerro(true, mysql_error(), __CLASS__, __FUNCTION__);
            } else {
                $model->id = mysql_insert_id();
                return new CONSTerro(false, '', __CLASS__, __FUNCTION__);
            }
        }
    }

    function Update(&$model) {

        if ($this->ModelValid($model)) {
            $Ar = $model->getArray();
            $FieldsAndValues = '';
            foreach ($Ar as $key => $val) {
                if ($key <> 'id') {
                    if ($FieldsAndValues == '') {
                        $FieldsAndValues = $key . ' = ' . $val;
                    } else {
                        $FieldsAndValues = $FieldsAndValues . ', ' . $key . ' = ' . $val;
                    }
                }
            }

            $strsql = 'update ' . $model->getTable()
                    . '   set ' . $FieldsAndValues
                    . ' where id = ' . $model->id;

            if (!mysql_query($strsql)) {
                return new CONSTerro(true, mysql_error(), __CLASS__, __FUNCTION__);
            } else {
                return new CONSTerro(false, '', __CLASS__, __FUNCTION__);
            }
        }
    }

    function Delete($model) {
        if ($this->ModelValid($model)) {
            $strsql = 'delete '
                    . '  from ' . $model->getTable()
                    . ' where id = ' . $model->id;

            if (!mysql_query($strsql)) {
                return new CONSTerro(true, mysql_error(), __CLASS__, __FUNCTION__);
            } else {
                return new CONSTerro(false, '', __CLASS__, __FUNCTION__);
            }
        }
    }

}
