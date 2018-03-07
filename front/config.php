<?php
error_reporting(E_ERROR);
session_start();

if (isset($_GET['remove'])) {
    $erro = $ctrlTitulo->Remove($_GET['remove']);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
}

?>

<div class="panel panel-default">
    <?php include 'titulos_quitar.php'; ?>
</div>