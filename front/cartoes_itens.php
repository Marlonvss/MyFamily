<script>
    function refresh_cartoes(id_cartao) {
        $.ajax({
            url: 'front/cartoes_services.php',
            type: 'post',
            dataType: 'text',
            data: {
                'id': id_cartao,
                'metodo': 'refresh_cartoes'
            }
        }).done(function (e) {
            location.reload();
        });
    }
</script>

<div class="panel panel-default">
    <div class="panel-heading">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#novo">Novo</button>
        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#novo">Atualizar faturas</button>
    </div>
    <div class="panel-body">
        <div class="table-responsive">

<?php

//Recupera todas Classificações
$ctrlClassificacao = new CONTROLLERclassificacoesfinanceiras();
$erro = $ctrlClassificacao->RecuperaLista($listClassificacoes);
if ($erro->erro) {
    echo $erro->mensagem;
}

//Recupera todos Centros de custos
$ctrlCentroCusto = new CONTROLLERcentroscustos();
$erro = $ctrlCentroCusto->RecuperaLista($listCentroCusto);
if ($erro->erro) {
    echo $erro->mensagem;
}

function MakeLinkOptions($id) {
    return
            '<button type="button" class="my_btn btn btn-link btn-md" onclick="loadEdit(' . $id . ')" data-toggle="modal" data-target="#editar"><i class="fa fa-folder-open-o" aria-hidden="true"></i></button>' .
            '<button type="button" class="my_btnbtn btn-link btn-md" onclick="loadDelete(' . $id . ')" data-toggle="modal" data-target="#deletar"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
}

//Recupera os itens dos cartões
$ControllItem = new CONTROLLERcartoes_itens();
$erro = $ControllItem->RecuperaLista($ListItens);
if ($erro->erro) {
    echo $erro->mensagem;
}

//Recupera os itens da fatura
$erro = $ControllItem->RecuperaListaFaturaCorrente($ListItensFatura);
if ($erro->erro) {
    echo $erro->mensagem;
}

$ControllCartao = new CONTROLLERcartoes();
$erro = $ControllCartao->RecuperaLista($ListCartoes);
if ($erro->erro) {
    echo $erro->mensagem;
} else {
    echo '<ul class="nav nav-tabs">';
    foreach ($ListCartoes as &$cartao) {
        if ($ListCartoes[0]->id == $cartao->id) {
            echo '<li class="active"><a data-toggle="tab" href="#cartao_'. $cartao->id .'">' . $cartao->descricao . '</a></li>';
        } else {
            echo '<li><a data-toggle="tab" href="#cartao_'. $cartao->id .'">' . $cartao->descricao . '</a></li>';
        }
    }
    echo '</ul>';

    echo '<div class="tab-content">';
    foreach ($ListCartoes as &$cartao) {
        $TotalCartao = 0;
        if ($ListCartoes[0]->id == $cartao->id) {
            echo '<div id="cartao_'. $cartao->id .'" class="tab-pane fade in active">';
        } else {
            echo '<div id="cartao_'. $cartao->id .'" class="tab-pane fade">';
        }
        echo '<div class="panel panel-default">';
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped table-bordered table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo '<td class="col-md-2">Data da compra</td>';
        echo '<td class="col-md-4">Descrição</td>';
        echo '<td class="col-md-2">Valor</td>';
        echo '<td class="col-md-1">Parcela</td>';
        echo '<td class="col-md-2">C. Custo</td>';
        echo '<td class="col-md-1">Opções</td>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Despesas fixas...
        foreach ($ListItens as &$obj) {
            if ($obj->id_cartao == $cartao->id) {
                if (($obj->parcelas == 0)) {
                    $ctrlClassificacao->LocateIDInList($obj->id_classificacaofinanceira, $listClassificacoes, $Classificacao);
                    $txtImagem = '';
                    if ($obj->id_classificacaofinanceira > 0) {
                        $txtImagem = '<i class="fa ' . $Classificacao->imagem . '"></i> - ';
                    };

                    $ctrlCentroCusto->LocateIDInList($obj->id_centrocusto, $listCentroCusto, $centroCusto);
                    $txtCentroCusto = '';
                    if ($obj->id_centrocusto > 0) {
                        $txtCentroCusto = $centroCusto->descricao;
                    }

                    echo '<tr>'
                    . '<td>' . date('d/m/Y', strtotime($obj->datacompra)) . '</td>'
                    . '<td>' . $txtImagem . $obj->descricao . '</td>'
                    . '<td>' . number_format($obj->valor, 2, ',', '.') . '</td>'
                    . '<td>FIXO</td>'
                    . '<td>' . $txtCentroCusto . '</td>'
                    . '<td>' . MakeLinkOptions($obj->id) . '</td>'
                    . '</tr>';

                    $TotalCartao = $TotalCartao + $obj->valor;
                }
            }
        }
        // Despesas parceladas...
        foreach ($ListItensFatura as &$obj) {
            $ControllItem->LocateIDInList($obj->id_cartao_item, $ListItens, $cartaoItem);
            if ($cartaoItem->id_cartao == $cartao->id) {

                $ctrlClassificacao->LocateIDInList($cartaoItem->id_classificacaofinanceira, $listClassificacoes, $Classificacao);
                $txtImagem = '';
                if ($cartaoItem->id_classificacaofinanceira > 0) {
                    $txtImagem = '<i class="fa ' . $Classificacao->imagem . '"></i> - ';
                };

                $ctrlCentroCusto->LocateIDInList($obj->id_centrocusto, $listCentroCusto, $centroCusto);
                $txtCentroCusto = '';
                if ($obj->id_centrocusto > 0) {
                    $txtCentroCusto = $centroCusto->descricao;
                }

                echo '<tr>'
                . '<td>' . date('d/m/Y', strtotime($cartaoItem->datacompra)) . '</td>'
                . '<td>' . $txtImagem . $cartaoItem->descricao . '</td>'
                . '<td>' . number_format($obj->valor, 2, ',', '.') . '</td>'
                . '<td>' . $obj->parcela_atual . '/' . $obj->parcela_final . '</td>'
                . '<td>' . $txtCentroCusto . '</td>'
                . '<td>' . MakeLinkOptions($cartaoItem->id) . '</td>'
                . '</tr>';

                $TotalCartao = $TotalCartao + $obj->valor;
            }
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '<div class="panel-footer">';
        echo '<b>Total </b>';
        echo '<i class="pull-right">R$ ' . number_format($TotalCartao, 2, ',', '.') . '</i>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
}
?>

        </div>
    </div>
</div>


<!-- <a href="#" class="btn btn-primary btn-circle dashboard-float-button" data-toggle="modal" data-target="#novo"><i class="glyphicon glyphicon-plus"></i></a> -->
<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="novo" tabindex="-1" role="dialog" aria-labelledby="novoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'cartoes_itens_add.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static" id="editar" tabindex="-1" role="dialog" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'cartoes_itens_edit.php'; ?>
        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static" id="deletar" tabindex="-1" role="dialog" aria-labelledby="deletarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'cartoes_itens_del.php'; ?>
        </div>
    </div>
</div>