<?php

$Controll = new CONTROLLERtitulo();

if (isset($_GET['remove'])) {
    $erro = $Controll->Remove($_GET['remove']);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
}

function MakeLinkOptions($id) {
    return
            '<a href="?pag=' . $_SESSION['pag'] . '_baixar&=' . $id . '"><span class="glyphicon glyphicon-save"></span> Baixar </a>' .
            '<a href="?pag=' . $_SESSION['pag'] . '_edit&edit=' . $id . '"><span class="glyphicon glyphicon-pencil"></span> Editar </a>' .
            '<a href="?pag=' . $_SESSION['pag'] . '&remove=' . $id . '"><span class="glyphicon glyphicon-remove"></span> Excluir </a>';
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Títulos a Pagar</h1>
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
                    <td class="col-md-1">ID</td>
                    <td>ID_Pessoa</td>
                    <td>Valor</td>
                    <td>Vencimento</td>
                    <td>Parcela</td>
                    <td class="col-md-3">Obs</td>
                    <td>Situação</td>
                    <td class="col-md-3">Opções</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $erro = $Controll->RecuperaListaPagar($List);
                if ($erro->erro) {
                    echo $erro->mensagem;
                } else {
                    foreach ($List as &$obj) {
                        echo '<tr>'
                        . '<td>' . $obj->id . '</td>'
                        . '<td>' . $obj->pessoa . '</td>'
                        . '<td>' . $obj->valor . '</td>'
                        . '<td>' . $obj->vencimento . '</td>'
                        . '<td>' . $obj->parcela_atual . '/'. $obj->parcela_final .'</td>'
                        . '<td>' . $obj->observacao . '</td>'
                        . '<td>' . $obj->getSituacaoTexto() . '</td>'
                        . '<td>' . MakeLinkOptions($obj->id) . '</td>'
                        . '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>   
    </div>
</div>