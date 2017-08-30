<script>
    function loadEdit(id) {
        $("#edt_id").prop('readonly', true).val('Carregando...');
        $("#edt_descricao").prop('readonly', true).val('Carregando...');
        $("#edt_imagem").prop('readonly', true).val('Carregando...');
        $.ajax({
            url: 'front/lancamentos_services.php',
            type: 'post',
            dataType: 'json',
            data: {
                'id': id,
                'metodo': 'load'
            }
        }).done(function (data) {
            $("#edt_id").val(data.id);
            $("#edt_descricao").prop('readonly', false).val(data.descricao);
            $("#edt_imagem").prop('readonly', false).val(data.imagem);
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
                'imagem': $('#edt_imagem').val(),
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
            <label class="col-sm-2 control-label">Imagem</label>
            <div class="col-sm-10">
                <select name="imagem" class="fonte-fa form-control" id="edt_imagem">
                    <?php
                    include 'helper_imagens.php';
                    foreach ($MyArrImagens as $key => $value) {
                        echo '<option value="' . $key . '">' . $value . '; - ' . $key . '</option>';
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
