<script>

    function loadEdit(id) {
        $("#edt_id").prop('readonly', true).val('Carregando...');
        $("#edt_descricao").prop('readonly', true).val('Carregando...');
        $("#edt_data").prop('readonly', true).val('Carregando...');
        $("#edt_valor").prop('readonly', true).val('Carregando...');
        $("#edt_sinal").prop('readonly', true).val('Carregando...');
        $("#edt_id_classificacaofinanceira").prop('readonly', true).val('Carregando...');
        $("#edt_id_centrocusto").prop('readonly', true).val('Carregando...');
        $("#edt_id_familia").prop('readonly', true).val('Carregando...');
        $("#edt_id_titulo").prop('readonly', true).val('Carregando...');
        $.ajax({
            url: 'front/lancamentos_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'metodo': 'load'
            }
        }).done(function (data) {
            // Não permitir editar quando for lançamento de titulo.
            $ReadOnly = data.id_titulo > 0;
            $("#edt_id").val(data.id);
            $("#edt_descricao").prop('readonly', false).val(data.descricao);
            $("#edt_data").prop('readonly', false).val(data.data);
            $("#edt_valor").prop('readonly', false).val(data.valor);
            $("#edt_sinal").prop('readonly', false).val(data.sinal);
            $("#edt_id_classificacaofinanceira").prop('readonly', false).val(data.id_classificacaofinanceira);
            $("#edt_id_centrocusto").prop('readonly', false).val(data.id_centrocusto);
            $("#edt_id_familia").prop('readonly', false).val(data.id_familia);
            $("#edt_id_titulo").prop('readonly', false).val(data.id_titulo);
        });
    }
    
    function edit() {
        $.ajax({
            url: 'front/lancamentos_services.php',
            type: 'post',
            dataType: 'html',
            data: {
                'id': $('#edt_id').val(),
                'descricao': $('#edt_descricao').val(),
                'data': $('#edt_data').val(),
                'valor': $('#edt_valor').val(),
                'sinal': $('#edt_sinal').val(),
                'id_classificacaofinanceira': $('#edt_id_classificacaofinanceira').val(),
                'id_centrocusto': $('#edt_id_centrocusto').val(),
                'id_familia': $('#edt_id_familia').val(),
                'id_titulo': $('#edt_id_titulo').val(),
                'metodo': 'edit'
            }
        }).done(function(){
            location.reload();
        });
    }
</script>

<form class="form-horizontal" method="post" autocomplete="off">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
        <h4 class="modal-title" id="editarLabel">Editar</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="edt_id" name="id" placeholder="ID" value="Carregando..." readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                <input type="text" id="edt_descricao" class="form-control" name="descricao" placeholder="Descrição"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Data</label>
            <div class="col-sm-10">
                <input type="text" data-format="dd/MM/yyyy" id="edt_data" class="form-control datepicker" name="data" placeholder="Data" value="<?php echo date('d/m/Y') ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Valor</label>
            <div class="col-sm-10">
                <input type="text" id="edt_valor" class="form-control" name="valor" placeholder="Valor"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Sinal</label>
            <div class="col-sm-10">
                <select name="sinal" class="form-control" id="edt_sinal">
                    <option value="0">Débito</option>
                    <option value="1">Crédito</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Class. Financeira</label>
            <div class="col-sm-10">
                <select name="id_classificacaofinanceira" class="form-control" id="edt_id_classificacaofinanceira">
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
                <select name="id_centrocusto" class="form-control" id="edt_id_centrocusto">
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
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="edit()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>
