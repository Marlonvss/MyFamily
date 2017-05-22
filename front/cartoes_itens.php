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
            alert(e);
            location.reload();
        });
    }
</script>

<?php

$ControllClassificacao = new CONTROLLERclassificacoesfinanceiras();
$erro = $ControllClassificacao->RecuperaLista($ListClassificacoes);
if ($erro->erro) {
    echo $erro->mensagem;
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
    foreach ($ListCartoes as &$cartao) {
        $TotalCartao = 0;
        
        echo '<div class="dashboard_container col-xs-12 col-sm-12 col-md-6">';
        echo '<div class="panel panel-default">';
        echo '<div class="panel-heading">';
        echo '<strong>' . $cartao->descricao . '</strong>';
        echo '<div class="btn btn-xs pull-right" onclick="refresh_cartoes(' . $cartao->id . ')"><i class="fa fa-refresh" aria-hidden="true"></i></div>';
        echo '</div>';
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped table-bordered table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo '<td class="col-md-3">Data da compra</td>';
        echo '<td class="col-md-5">Descrição</td>';
        echo '<td class="col-md-2">Valor</td>';
        echo '<td class="col-md-1">Parcela</td>';
        echo '<td class="col-md-1">Opções</td>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Despesas fixas...
        foreach ($ListItens as &$obj) {
            if ($obj->id_cartao == $cartao->id) {
                if (($obj->parcelas == 0)) {
                    $ControllClassificacao->LocateIDInList($obj->id_classificacaofinanceira, $ListClassificacoes, $Classificacao);
                    $txtImagem = '';
                    if ($obj->id_classificacaofinanceira > 0) {
                        $txtImagem = '<i class="fa ' . $Classificacao->imagem . '"></i> - ';
                    };
                    echo '<tr>'
                    . '<td>' . date('d/m/Y', strtotime($obj->datacompra)) . '</td>'
                    . '<td>' . $txtImagem . $obj->descricao . '</td>'
                    . '<td>' . $obj->valor . '</td>'
                    . '<td>FIXO</td>'
                    . '<td></td>'
                    . '</tr>';
                    
                    $TotalCartao = $TotalCartao + $obj->valor;
                }
            }
        }
        // Despesas parceladas...
        foreach ($ListItensFatura as &$obj) {
            $ControllItem->LocateIDInList($obj->id_cartao_item, $ListItens, $cartaoItem);
            if ($cartaoItem->id_cartao == $cartao->id) {
                $ControllClassificacao->LocateIDInList($cartaoItem->id_classificacaofinanceira, $ListClassificacoes, $Classificacao);
                $txtImagem = '';
                if ($cartaoItem->id_classificacaofinanceira > 0) {
                        $txtImagem = '<i class="fa ' . $Classificacao->imagem . '"></i> - ';
                };
                echo '<tr>'
                . '<td>' . date('d/m/Y', strtotime($cartaoItem->datacompra)) . '</td>'
                . '<td>' . $txtImagem . $cartaoItem->descricao . '</td>'
                . '<td>' . $obj->valor . '</td>'
                . '<td>' . $obj->parcela_atual . '/' . $obj->parcela_final . '</td>'
                . '<td></td>'
                . '</tr>';

                $TotalCartao = $TotalCartao + $obj->valor;
            }
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '<div class="panel-footer">';
        echo '<b>Total </b>';
        echo '<i class="pull-right">R$ '.number_format($TotalCartao, 2, ',', '.').'</i>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>

<a href="#" class="btn btn-primary btn-circle dashboard-float-button" data-toggle="modal" data-target="#novo"><i class="glyphicon glyphicon-plus"></i></a>
<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="novo" tabindex="-1" role="dialog" aria-labelledby="novoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php include 'cartoes_itens_add.php'; ?>
        </div>
    </div>
</div>