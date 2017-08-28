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
            '<button type="button" class="my_btn btn btn-link btn-md" onclick="loadEdit(' . $id . ')" data-toggle="modal" data-target="#editar"><i class="fa fa-folder-open-o" aria-hidden="true"></i></button>' .
            '<button type="button" class="my_btnbtn btn-link btn-md" onclick="loadDelete(' . $id . ')" data-toggle="modal" data-target="#deletar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
}

//Recupera todos Classificacoes FInanceiras
$ctrlClassificacaoFinanceira = new CONTROLLERclassificacoesfinanceiras();
$erro = $ctrlClassificacaoFinanceira->RecuperaLista($listClassificacaoFinanceira);
if ($erro->erro) {
    echo $erro->mensagem;
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
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Descrição</td>
                        <td>Num. Cartão</td>
                        <td>Limite</td>
                        <td>Dia de fechamento</td>
                        <td>Dia de vencimento</td>
                        <td>Classificação Financeira</td>
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

                            $ctrlClassificacaoFinanceira->LocateIDInList($obj->id_classificacaofinanceira, $listClassificacaoFinanceira, $classificacaoFinanceira);
                            
                            if ($classificacaoFinanceira->id > 0) {
                                $txtClassificacaoFinanceira = '<i class="fa ' . $classificacaoFinanceira->imagem . '"></i> - '.$classificacaoFinanceira->descricao;
                            } else {
                                $txtClassificacaoFinanceira = '';
                            }

                            echo '<tr>'
                            . '<td>' . $obj->id . '</td>'
                            . '<td>' . $obj->descricao . '</td>'
                            . '<td>' . $obj->numero . '</td>'
                            . '<td>' . $obj->limite . '</td>'
                            . '<td>' . $obj->dia_fechamento . '</td>'
                            . '<td>' . $obj->dia_vencimento . '</td>'
                            . '<td>' . $txtClassificacaoFinanceira . '</td>'
                            . '<td class="col-md-1">' . MakeLinkOptions($obj->id) . '</td>'
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
<div class="modal fade" data-backdrop="static" id="novo" tabindex="-1" role="dialog" aria-labelledby="novoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'cartoes_add.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static" id="editar" tabindex="-1" role="dialog" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'cartoes_edit.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static" id="deletar" tabindex="-1" role="dialog" aria-labelledby="deletarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'cartoes_del.php'; ?>
        </div>
    </div>
</div>
