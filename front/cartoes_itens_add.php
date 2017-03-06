<script>
    function add() {
        $.ajax({
            url: 'front/cartoes_itens_services.php',
            type: 'post',
            dataType: 'text',
            data: {
                'datacompra': $('#add_datacompra').val(),
                'descricao': $('#add_descricao').val(),
                'valor': $('#add_valor').val(),
                'parcelas': $('#add_parcelas').val(),
                'mes_fatura_inicio': $('#add_mes_fatura_inicio').val(),
                'id_centrocusto': $('#add_id_centrocusto').val(),
                'id_classificacaofinanceira': $('#add_id_classificacaofinanceira').val(),
                'id_cartao': $('#add_cartao').val(),
                'metodo': 'add'
            }
        }).done(function () {
            location.reload();
        });
    }
</script>


<form class="form-horizontal " autocomplete="off">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
        <h4 class="modal-title" id="novoLabel">Novo</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Cartão</label>
            <div class="col-sm-10">
                <select name="cartoes" class="form-control" id="add_cartao">
                    <?php
                    $Controll = new CONTROLLERCartoes;
                    $erro = $Controll->RecuperaLista($List);
                    if ($erro->erro) {
                        echo $erro->mensagem;
                    } else {
                        foreach ($List as &$obj) {
                            echo '<option value="' . $obj->id . '">' . $obj->descricao . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Data da compra</label>
            <div class="col-sm-10">
                <input type="text" data-format="dd/MM/yyyy" id="add_datacompra" class="form-control datepicker" name="datacompra" placeholder="Data da compra" value="<?php echo date('d/m/Y') ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                <input type="text" id="add_descricao" class="form-control" name="descricao" placeholder="Descrição" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor da parcela</label>
            <div class="col-sm-10">
                <input type="number" id="add_valor" class="form-control" name="valor" placeholder="Valor da parcela" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Parcelas</label>
            <div class="col-sm-10">
                <input type="number" id="add_parcelas" class="form-control" name="parcelas" placeholder="Parcela" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Mês da 1ª parcela</label>
            <div class="col-sm-10">
                <select class="form-control" name="mes_fatura_inicio" id="add_mes_fatura_inicio">
                    <?php
                    if ($_SESSION['mes'] == 1) {
                        echo '<option value="1" selected>Janeiro</option>';
                    } else {
                        echo '<option value="1">Janeiro</option>';
                    }

                    if ($_SESSION['mes'] == 2) {
                        echo '<option value="2" selected>Fevereiro</option>';
                    } else {
                        echo '<option value="2">Fevereiro</option>';
                    }

                    if ($_SESSION['mes'] == 3) {
                        echo '<option value="3" selected>Março</option>';
                    } else {
                        echo '<option value="3">Março</option>';
                    }

                    if ($_SESSION['mes'] == 4) {
                        echo '<option value="4" selected>Abril</option>';
                    } else {
                        echo '<option value="4">Abril</option>';
                    }

                    if ($_SESSION['mes'] == 5) {
                        echo '<option value="5" selected>Maio</option>';
                    } else {
                        echo '<option value="5">Maio</option>';
                    }

                    if ($_SESSION['mes'] == 6) {
                        echo '<option value="6" selected>Junho</option>';
                    } else {
                        echo '<option value="6">Junho</option>';
                    }

                    if ($_SESSION['mes'] == 7) {
                        echo '<option value="7" selected>Julho</option>';
                    } else {
                        echo '<option value="7">Julho</option>';
                    }

                    if ($_SESSION['mes'] == 8) {
                        echo '<option value="8" selected>Agosto</option>';
                    } else {
                        echo '<option value="8">Agosto</option>';
                    }

                    if ($_SESSION['mes'] == 9) {
                        echo '<option value="9" selected>Setembro</option>';
                    } else {
                        echo '<option value="9">Setembro</option>';
                    }

                    if ($_SESSION['mes'] == 10) {
                        echo '<option value="10" selected>Outubro</option>';
                    } else {
                        echo '<option value="10">Outubro</option>';
                    }

                    if ($_SESSION['mes'] == 11) {
                        echo '<option value="1" selected>Novembro</option>';
                    } else {
                        echo '<option value="11">Novembro</option>';
                    }

                    if ($_SESSION['mes'] == 12) {
                        echo '<option value="12" selected>Dezembro</option>';
                    } else {
                        echo '<option value="12">Dezembro</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Classificação financeira</label>
            <div class="col-sm-10">
                <select name="id_classificacaofinanceira" class="form-control" id="add_id_classificacaofinanceira">
                    <?php
                    $Controll = new CONTROLLERclassificacoesfinanceiras;
                    $erro = $Controll->RecuperaLista($List);
                    if ($erro->erro) {
                        echo $erro->mensagem;
                    } else {
                        echo '<option value="0"></option>';
                        foreach ($List as &$obj) {
                            echo '<option value="' . $obj->id . '">' . $obj->descricao . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Centro de custo</label>
            <div class="col-sm-10">
                <select name="id_centrocusto" class="form-control" id="add_id_centrocusto">
                    <?php
                    $Controll = new CONTROLLERcentroscustos;
                    $erro = $Controll->RecuperaLista($List);
                    if ($erro->erro) {
                        echo $erro->mensagem;
                    } else {
                        echo '<option value="0"></option>';
                        foreach ($List as &$obj) {
                            echo '<option value="' . $obj->id . '">' . $obj->descricao . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="add()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>
