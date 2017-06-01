<script>
    function add() {
        $.ajax({
            url: 'front/titulos_services.php',
            type: 'post',
            dataType: 'text',
            data: {
                'descricao': $('#add_descricao').val(),
                'vencimento': $('#add_vencimento').val(),
                'valor': $('#add_valor').val(),
                'valorpago': $('#add_valorpago').val(),
                'quitado': $('#add_quitado').val(),
                'observacao': $('#add_observacao').val(),
                'id_classificacaofinanceira': $('#add_id_classificacaofinanceira').val(),
                'id_centrocusto': $('#add_id_centrocusto').val(),
                'id_familia': $('#add_id_familia').val(),
                'metodo': 'add'
            }
        }).done(function(e){
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
            <label class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                <input type="text" id="add_descricao" class="form-control" name="Descricao" placeholder="Descrição" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Vencimento</label>
            <div class="col-sm-10">
                <input type="text" data-format="dd/MM/yyyy" id="add_vencimento" class="form-control datepicker" name="Vencimento" placeholder="Vencimento" value="<?php echo date('d/m/Y') ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor</label>
            <div class="col-sm-10">
                <input type="text" id="add_valor" class="form-control" name="Valor" placeholder="Valor" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Cl. Financeira</label>
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
            <label class="col-sm-2 control-label">C. Custo</label>
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
