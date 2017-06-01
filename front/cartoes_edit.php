<script>
    function loadEdit(id) {
        $("#edt_id").prop('readonly', true).val('Carregando...');
        $("#edt_descricao").prop('readonly', true).val('Carregando...');
        $("#edt_numero").prop('readonly', true).val('Carregando...');
        $("#edt_limite").prop('readonly', true).val('Carregando...');
        $("#edt_dia_fechamento").prop('readonly', true).val('Carregando...');
        $("#edt_dia_vencimento").prop('readonly', true).val('Carregando...');
        $("#edt_id_classificacaofinanceira").prop('readonly', true).val('Carregando...');
        $.ajax({
            url: 'front/cartoes_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'metodo': 'load'
            }
        }).done(function (data) {
            $("#edt_id").val(data.id);
            $("#edt_descricao").prop('readonly', false).val(data.descricao);
            $("#edt_numero").prop('readonly', false).val(data.numero);
            $("#edt_limite").prop('readonly', false).val(data.limite);
            $("#edt_dia_fechamento").prop('readonly', false).val(data.dia_fechamento);
            $("#edt_dia_vencimento").prop('readonly', false).val(data.dia_vencimento);
            $("#edt_id_classificacaofinanceira").prop('readonly', false).val(data.id_classificacaofinanceira);
        });
    }
    
    function edit() {
        $.ajax({
            url: 'front/cartoes_services.php',
            type: 'post',
            dataType: 'html',
            data: {
                'id': $('#edt_id').val(),
                'descricao': $('#edt_descricao').val(),
                'numero': $('#edt_numero').val(),
                'limite': $('#edt_limite').val(),
                'dia_fechamento': $('#edt_dia_fechamento').val(),
                'dia_vencimento': $('#edt_dia_vencimento').val(),
                'id_classificacaofinanceira': $('#edt_id_classificacaofinanceira').val(),
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
            <label class="col-sm-2 control-label">Num. Cartão</label>
            <div class="col-sm-10">
                <input type="text" id="edt_numero" class="form-control" name="numero" placeholder="Num. Cartão"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Limite</label>
            <div class="col-sm-10">
                <input type="text" id="edt_limite" class="form-control" name="limite" placeholder="Limite"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Dia de fechamento</label>
            <div class="col-sm-10">
                <input type="text" id="edt_dia_fechamento" class="form-control" name="dia_fechamento" placeholder="Dia de fechamento"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Dia de vencimento</label>
            <div class="col-sm-10">
                <input type="text" id="edt_dia_vencimento" class="form-control" name="dia_vencimento" placeholder="Dia de vencimento"  readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Cl. Financeira</label>
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
    </div>
    <div class="modal-footer">
        <button type="submit" onclick="edit()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
</form>
