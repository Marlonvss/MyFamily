<?php
$Controll = new CONTROLLERcartoes();
error_reporting(E_ERROR);
session_start();

if (isset($_GET['remove'])) {
    $erro = $Controll->Remove($_GET['remove']);
    if ($erro->erro) {
        echo $erro->mensagem;
    }
}

function MakeLinkOptions($id) {
    return
            '<button type="button" class="btn btn-link btn-xs" onclick="loadEdit(' . $id . ')" data-toggle="modal" data-target="#editar"><i class="fa fa-folder-open-o" aria-hidden="true"></i></button>' .
            '<div class="btn-group">' .
            '  <button type="button" class="btn btn-link btn-xs dropdown-toggle" data-toggle="dropdown">' .
            '    <i class="fa fa-angle-down" aria-hidden="true"></i>' .
            '  </button>' .
            '  <ul class="dropdown-menu" role="menu">' .
            '    <button type="button" class="btn btn-link btn-md" onclick="loadDelete(' . $id . ')" data-toggle="modal" data-target="#deletar"><i class="fa fa-trash-o" aria-hidden="true"></i> - Deletar</button>' .
            '    <a href="?pag=cartoes_itens&id='. $id .'"><button type="button" class="btn btn-link btn-md"><i class="fa fa-usd" aria-hidden="true"></i> - Movimentos</button></a>' .
            '  </ul>' .
            '</div>';
}
?>

<div class="row">
    <div class="col-xs-12">
        <span class="page-title red"><h2>Cartões</h2></span>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#novo">Novo</button>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Descrição</td>
                    <td>Num. Cartão</td>
                    <td>Limite</td>
                    <td>Dia de fechamento</td>
                    <td>Dia de vencimento</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $erro = $Controll->RecuperaLista($List, 'where id_familia = ' . unserialize($_SESSION['userLogged'])->id_familia);
                if ($erro->erro) {
                    echo $erro->mensagem;
                } else {

                    foreach ($List as &$obj) {
                        echo '<tr>'
                        . '<td>' . $obj->id . '</td>'
                        . '<td>' . $obj->descricao . '</td>'
                        . '<td>' . $obj->numero . '</td>'
                        . '<td>' . $obj->limite . '</td>'
                        . '<td>' . $obj->dia_fechamento . '</td>'
                        . '<td>' . $obj->dia_vencimento . '</td>'
                        . '<td class="col-md-1">' . MakeLinkOptions($obj->id) . '</td>'
                        . '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="novo" tabindex="-1" role="dialog" aria-labelledby="novoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'cartoes_add.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'cartoes_edit.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="deletar" tabindex="-1" role="dialog" aria-labelledby="deletarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'cartoes_del.php'; ?>
        </div>
    </div>
</div>
