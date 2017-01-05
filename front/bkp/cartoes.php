<?php

$Controll = new CONTROLLERcartoes();

if (isset($_GET['remove'])) {
    $erro = $Controll->Remove($_GET['remove']);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
}

function MakeLinkOptions($id) {
    return
            '<a href="?pag=' . $GLOBALS["pag_faturas"] . '&card=' . $id . '"><span class="glyphicon glyphicon-credit-card"></span> Faturas </a>' .
            '<a href="?pag=' . $_SESSION['pag'] . '_edit&edit=' . $id . '"><span class="glyphicon glyphicon-pencil"></span> Editar </a>' .
            '<a href="?pag=' . $_SESSION['pag'] . '&remove=' . $id . '"><span class="glyphicon glyphicon-remove"></span> Excluir </a>';
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cartões</h1>
    </div>
</div>
        
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="?pag=<?php echo $_SESSION['pag'] ?>_add">Novo</a>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Descrição</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $erro = $Controll->RecuperaLista($List);
                if ($erro->erro) {
                    echo $erro->mensagem;
                } else {

                    foreach ($List as &$obj) {
                        echo '<tr>'
                        . '<td class="col-md-1">' . $obj->id . '</td>'
                        . '<td>' . $obj->descricao . '</td>'
                        . '<td class="col-md-3">' . MakeLinkOptions($obj->id) . '</td>'
                        . '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>   
    </div>
</div>