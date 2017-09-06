<script>
    function add() {
        $.ajax({
            url: 'front/lancamentos_services.php',
            type: 'post',
            dataType: 'text',
            data: {
                'descricao': $('#add_lancamento_descricao').val(),
                'data': $('#add_lancamento_data').val(),
                'valor': $('#add_lancamento_valor').val(),
                'sinal': $('#add_lancamento_sinal').val(),
                'id_classificacaofinanceira': $('#add_lancamento_id_classificacaofinanceira').val(),
                'id_centrocusto': $('#add_lancamento_id_centrocusto').val(),
                'id_familia': $('#add_lancamento_id_familia').val(),
                'id_titulo': $('#add_lancamento_id_titulo').val(),
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
                <input type="text" id="add_lancamento_descricao" class="form-control" name="descricao" placeholder="Descrição" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Data</label>
            <div class="col-sm-10">
                <input type="text" data-format="dd/MM/yyyy" id="add_lancamento_data" class="form-control datepicker" name="data" placeholder="Data" value="<?php echo date('d/m/Y') ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor</label>
            <div class="col-sm-10">
                <input type="text" id="add_lancamento_valor" class="form-control" name="valor" placeholder="Valor" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Sinal</label>
            <div class="col-sm-10">
                <select name="sinal" class="form-control" id="edt_sinal">
                    <option value="0" selected>Débito</option>
                    <option value="1">Crédito</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Cl. Financeira</label>
            <div class="col-sm-10">
                <select name="id_classificacaofinanceira" class="form-control" id="add_lancamento_id_classificacaofinanceira">
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
                <select name="id_centrocusto" class="form-control" id="add_lancamento_id_centrocusto">
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
