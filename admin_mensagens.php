<?php
ob_start();
session_start();

include_once './model/model_mensagem.php';
include_once './controller/controller_mensagem.php';

if (isset($_GET['lida'])) {
    MensagemRespondida($_GET['lida']);
}
if (isset($_GET['remove'])) {
    DeletarMensagem($_GET['remove']);
}

function MakeLinkOptions($id) {
    return
            '<a href="?lida=' . $id . '"><span class="glyphicon glyphicon-eye-open"></span> Lida </a>' .
            '<a href="?remove=' . $id . '"><span class="glyphicon glyphicon-remove"></span> Excluir </a>';
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Mensagens</h4>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Mensagem</td>
                    <td>Email</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $Lista = RecuperaTodasMensagens();
                foreach ($Lista as &$mensagem) {

                    echo '<tr>'
                    . '<td class="col-md-2">' . $mensagem->nome . '</td>'
                    . '<td class="col-md-5">' . $mensagem->mensagem . '</td>'
                    . '<td class="col-md-3">' . $mensagem->email . '</td>'
                    . '<td class="col-md-2">' . MakeLinkOptions($mensagem->id) . '</td>'
                    . '</tr>';
                }
                ?>
            </tbody>
        </table>   
    </div>
</div>

<?php
$Conteudo = ob_get_contents();

ob_end_clean();

include("admin_master.php");
