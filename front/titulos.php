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

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#minhas">Minhas despesas</a></li>
    <li><a data-toggle="tab" href="#outras">Outras despesas</a></li>
</ul>

<div class="tab-content">
    <div id="minhas" class="tab-pane fade in active">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <td class="col-md-1">#</td>
                            <td class="col-md-4">Descrição</td>
                            <td class="col-md-1">Vencimento</td>
                            <td class="col-md-2">Valor</td>
                            <td class="col-md-2">Valor pago</td>
                            <td class="col-md-1">Quitado?</td>
                            <td class="col-md-1">Opções</td>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $erro = $Controll->RecuperaListaMeusTitulosCorrente($List);
                        if ($erro->erro) {
                            echo $erro->mensagem;
                        } else {
                            foreach ($List as &$obj) {
                                if ($obj->quitado == '0') {
                                    $txtQuitado = 'Não';
                                } else {
                                    $txtQuitado = 'Sim';
                                }

                                echo '<tr>'
                                . '<td>' . $obj->id . '</td>'
                                . '<td>' . $obj->descricao . '</td>'
                                . '<td>' . date('d/m/Y', strtotime($obj->vencimento)) . '</td>'
                                . '<td>R$ ' . number_format($obj->valor, 2, ',', '.') . '</td>'
                                . '<td>R$ ' . number_format($obj->valorpago, 2, ',', '.') . '</td>'
                                . '<td>' . $txtQuitado . '</td>'
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
    <div id="outras" class="tab-pane fade">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <td class="col-md-1">#</td>
                            <td class="col-md-4">Descrição</td>
                            <td class="col-md-1">Vencimento</td>
                            <td class="col-md-2">Valor</td>
                            <td class="col-md-2">Valor pago</td>
                            <td class="col-md-1">Quitado?</td>
                            <td class="col-md-1">Opções</td>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $erro = $Controll->RecuperaListaOutrosTitulosCorrente($ListOutras);
                        if ($erro->erro) {
                            echo $erro->mensagem;
                        } else {
                            foreach ($ListOutras as &$obj) {

                                if ($obj->quitado == '0') {
                                    $txtQuitado = 'Não';
                                } else {
                                    $txtQuitado = 'Sim';
                                }

                                echo '<tr>'
                                . '<td>' . $obj->id . '</td>'
                                . '<td>' . $obj->descricao . '</td>'
                                . '<td>' . date('d/m/Y', strtotime($obj->vencimento)) . '</td>'
                                . '<td>R$ ' . number_format($obj->valor, 2, ',', '.') . '</td>'
                                . '<td>R$ ' . number_format($obj->valorpago, 2, ',', '.') . '</td>'
                                . '<td>' . $txtQuitado . '</td>'
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