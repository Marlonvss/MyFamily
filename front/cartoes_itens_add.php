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
        }).done(function (e) {
            alert(e);
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
                <input type="number" id="add_parcelas" class="form-control" name="parcelas" placeholder="Parcela" value="1" min="1" max="99" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Mês da 1ª parcela</label>
            <div class="col-sm-10">
                <select class="form-control" name="mes_fatura_inicio" id="add_mes_fatura_inicio">
                    <option value="0">Mês da compra</option>
                    <option value="1">Mês após a compra</option>
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
