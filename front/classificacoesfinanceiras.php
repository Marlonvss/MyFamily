<?php
$Controll = new CONTROLLERclassificacoesfinanceiras();
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
            '<button type="button" class="my_btnbtn btn-link btn-md" onclick="loadDelete(' . $id . ')" data-toggle="modal" data-target="#deletar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
}
?>


<div class="row">
    <div class="col-xs-12">
        <span class="page-title red"><h2>Classificações financeiras</h2></span>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#novo">Novo</button>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Descrição</td>
                        <td class="col-md-1">Imagem</td>
                        <td class="col-md-1">Opções</td>
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
                            . '<td>' . $obj->id . '</td>'
                            . '<td>' . $obj->descricao . '</td>'
                            . '<td><i class="fa ' . $obj->imagem . '"</i></td>'
                            . '<td>' . MakeLinkOptions($obj->id) . '</td>'
                            . '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="novo" tabindex="-1" role="dialog" aria-labelledby="novoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'classificacoesfinanceiras_add.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'classificacoesfinanceiras_edit.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="deletar" tabindex="-1" role="dialog" aria-labelledby="deletarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'classificacoesfinanceiras_del.php'; ?>
        </div>
    </div>
</div>
