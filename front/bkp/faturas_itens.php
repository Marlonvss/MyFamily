<?php

$Controll = new CONTROLLERfaturas_itens();

if (isset($_GET['remove'])) {
    $erro = $Controll->Remove($_GET['remove']);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
}

function MakeLinkOptions($id) {
    return
            '<a href="?pag=' . $_SESSION['pag'] . '_edit&edit=' . $id . '&fat='.$_GET['fat'].'"><span class="glyphicon glyphicon-pencil"></span> Editar </a>' .
            '<a href="?pag=' . $_SESSION['pag'] . '&fat='.$_GET['fat'].'&remove=' . $id . '"><span class="glyphicon glyphicon-remove"></span> Excluir </a>';
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Itens da Fatura</h1>
    </div>
</div>
        
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="?pag=<?php echo $_SESSION['pag'] ?>_add&fat=<?php echo $_GET['fat'] ?>">Novo</a>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td class="col-md-1">ID</td>
                    <td>Descricao</td>
                    <td class="col-md-2">Valor</td>
                    <td class="col-md-2">Opções</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $erro = $Controll->RecuperaLista($List,' where id_fatura = '.$_GET['fat']);
                if ($erro->erro) {
                    echo $erro->mensagem;
                } else {

                    foreach ($List as &$obj) {
                        echo '<tr>'
                        . '<td>' . $obj->id . '</td>'
                        . '<td>' . $obj->descricao . '</td>'
                        . '<td>' . $obj->valor . '</td>'
                        . '<td>' . MakeLinkOptions($obj->id) . '</td>'
                        . '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>   
    </div>
</div>