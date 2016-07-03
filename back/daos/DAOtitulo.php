<?php

error_reporting(E_ERROR);

include_once './autoload.php';

class DAOtitulo extends DAObase {

    public function ModelValid($model) {
        return (get_class($model) == 'titulo');
    }

    public function RefreshTituloDeFatura($fatura_id) {

        parent::Conect();

        $strsql = 'update titulos t '
                .'  join faturas f on f.id_titulo = t.id '
                .'  set t.valor = (select sum(fi.valor) from faturas_itens fi where fi.id_fatura = '. $fatura_id .') '
                .' where f.id = '. $fatura_id;

        if (!mysql_query($strsql)) {
            return new CONSTerro(true, mysql_error(), __CLASS__, __FUNCTION__);
        } else {
            return new CONSTerro(false, '', __CLASS__, __FUNCTION__);
        }
    }

}
