<?php
$Controll = new CONTROLLERtitulos();
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
            '<button type="button" class="my_btn btn btn-link btn-md" onclick="loadEdit(' . $id . ')" data-toggle="modal" data-target="#editar"><i class="fa fa-folder-open-o" aria-hidden="true"></i></button>' .
            '<button type="button" class="my_btn btn btn-link btn-md" onclick="loadQuitar(' . $id . ')" data-toggle="modal" data-target="#quitar"><i class="fa fa-usd" aria-hidden="true"></i></button>' .
            '<button type="button" class="my_btnbtn btn-link btn-md" onclick="loadDelete(' . $id . ')" data-toggle="modal" data-target="#deletar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
}
?>

<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Descrição</td>
                    <td>Vencimento</td>
                    <td>Valor</td>
                    <td>Valor pago</td>
                    <td>Quitado?</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $erro = $Controll->RecuperaListaFaturaCorrente($List);
                if ($erro->erro) {
                    echo $erro->mensagem;
                } else {

                    if ($obj->quitado == '0') {
                        $txtQuitado = 'Não';
                    } else {
                        $txtQuitado = 'Sim';
                    }                    
                    
                    foreach ($List as &$obj) {
                        echo '<tr>'
                        . '<td>' . $obj->id . '</td>'
                        . '<td>' . $obj->descricao . '</td>'
                        . '<td>' . $obj->vencimento . '</td>'
                        . '<td>' . $obj->valor . '</td>'
                        . '<td>' . $obj->valorpago . '</td>'
                        . '<td>' . $txtQuitado . '</td>'
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
<div class="modal fade" data-backdrop="static" id="novo" tabindex="-1" role="dialog" aria-labelledby="novoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'titulos_add.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static" id="editar" tabindex="-1" role="dialog" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'titulos_edit.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static" id="deletar" tabindex="-1" role="dialog" aria-labelledby="deletarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'titulos_del.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static" id="quitar" tabindex="-1" role="dialog" aria-labelledby="deletarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'titulos_quitar.php'; ?>
        </div>
    </div>
</div>


<a href="#" class="btn btn-primary btn-circle dashboard-float-button" data-toggle="modal" data-target="#novo"><i class="glyphicon glyphicon-plus"></i></a>