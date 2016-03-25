function Mensagem_refreshCaracters() {
    var tamanho = $('#form_mensagem #mensagem').val().length;
    document.getElementById('contador').innerHTML = (200 - tamanho) + ' Restantes';
}

function Mensagem_addMensagem() {
    Mensagem_SetLoading(true);
    $.ajax({
        url: 'mensagem_ajax.php',
        type: 'post',
        dataType: 'html',
        data: {
            'metodo': 'AddMensagem',
            'nome': $('#form_mensagem #nome').val(),
            'email': $('#form_mensagem #email').val(),
            'mensagem': $('#form_mensagem #mensagem').val()
        }
    }).done(function (data) {
        Mensagem_SetLoading(false);
        $('#msg').html(data);
        $('#form_mensagem #nome').val('');
        $('#form_mensagem #email').val('');
        $('#form_mensagem #mensagem').val('');
        Mensagem_refreshCaracters();
    });
}

function Mensagem_SetLoading(loading) {
    if (loading === true) {
        $('#mensagem #loading').show();
        $('#mensagem #loaded').hide();
    } else {
        $('#mensagem #loading').hide();
        $('#mensagem #loaded').show();
    }
}