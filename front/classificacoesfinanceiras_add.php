<script>
    function add() {
        $.ajax({
            url: 'front/classificacoesfinanceiras_services.php',
            type: 'post',
            dataType: 'text',
            data: {
                'descricao': $('#add_descricao').val(),
                'imagem': $('#add_imagem').val(),
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
            <label class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                <input type="text" id="add_descricao" class="form-control" name="descricao" placeholder="Descrição" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Imagem</label>
            <div class="col-sm-10">
                <select name="imagem" class="fonte-fa form-control" id="add_imagem">
                    <?php
                    include 'helper_imagens.php';
                    foreach ($MyArrImagens as $key => $value) {
                        echo '<option value="' . $key . '">' . $value . '; - ' . $key . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" onclick="add()" class="btn btn-primary" data-dismiss="modal">Salvar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
    </div>
</form>
