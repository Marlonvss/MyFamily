<?php
ob_start();
session_start();

include_once './model/model_mensagem.php';
include_once './model/model_individual.php';
include_once './controller/controller_mensagem.php';
include_once './controller/controller_individual.php';

if (isset($_GET['msgLida'])) {
    MensagemRespondida($_GET['msgLida']);
} else {
    if (isset($_GET['msgRemove'])) {
        DeletarMensagem($_GET['msgRemove']);
    }
}

function MakeLink($id) {
    return '<a href="?edit=' . $id . '"><span class="glyphicon glyphicon-pencil"></span></a>' .
            '<a href="?remove=' . $id . '"><span class="glyphicon glyphicon-remove"></span></a>';
}

$ListaConvidados = RecuperaTodosIndividuais();
$ListaConvidadosConfirmados = RecuperaTodosIndividuais('Where confirmado = 1');
$ListaConvidadosCancelados = RecuperaTodosIndividuais('Where confirmado = 0');
$ListaConvidadosNaoConfirmados = RecuperaTodosIndividuais('Where confirmado = -1');
$ListaMensagem = RecuperaTodasMensagens();
?>

<script src="./js/dashboard_js.js"></script>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Dashboard</h4>
    </div>
    <div class="panel-body">
        <p>Total de Convidados Cadastrados <span class="badge"><?php echo count($ListaConvidados) ?></span></p>
        <p>Total de Convidados Confirmados <span class="badge"><?php echo count($ListaConvidadosConfirmados) ?></span></p>
        <p>Total de Convidados Cancelados <span class="badge"><?php echo count($ListaConvidadosCancelados) ?></span></p>
        <p>Total de Convidados não Confirmados <span class="badge"><?php echo count($ListaConvidadosNaoConfirmados) ?></span></p>
        <p>Total de Mensagens <span class="badge"><?php echo count($ListaMensagem) ?></span></p>
    </div>
</div>
<?php
$Conteudo = ob_get_contents();

ob_end_clean();

include("admin_master.php");
