<?php
ob_start();
session_start();

include_once './model/model_individual.php';
include_once './controller/controller_individual.php';

if (isset($_GET['edit'])) {
    echo '<META http-equiv="refresh" content="0;URL=?page=individuais_editar&edit=' . $_GET['edit'] . '">';
}
if (isset($_GET['remove'])) {
    DeletarIndividual($_GET['remove']);
}

if (isset($_GET['convite'])) {
    $_SESSION['convite'] = $_GET['convite'];
}

function MakeLinkOptions($id) {
    return
            '<a href="?edit=' . $id . '"><span class="glyphicon glyphicon-pencil"></span> Editar </a>' .
            '<a href="?remove=' . $id . '"><span class="glyphicon glyphicon-remove"></span> Excluir </a>';
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Individuais</h4>
        <a href="?page=individuais_novo">Novo</a>
    </div>
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <td>Convite</td>
                    <td>Nome</td>
                    <td>Origem</td>
                    <td>Genero</td>
                    <td>Confirmado</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $ListaIndividuais = array();
                if ($_SESSION['convite'] > 0) {
                    $ListaIndividuais = RecuperaTodosIndividuais(' where id_convite = ' . $_SESSION['convite']);
                } else {
                    $ListaIndividuais = RecuperaTodosIndividuais();
                }

                foreach ($ListaIndividuais as &$individual) {

                    $_Nome = $individual->nome;
                    $_Convite = $individual->id_convite;

                    // Texto coluna "Familia"
                    if ($individual->origem == "R") {
                        $_Familia = "Noiva";
                    } else {
                        $_Familia = "Noivo";
                    }

                    // Texto coluna "Adulto"
                    if ($individual->genero == 'C') {
                        $_Genero = "Criança";
                    } else if ($individual->genero == 'M') {
                        $_Genero = "Masculino";
                    } else {
                        $_Genero = "Feminino";
                    }

                    if ($individual->confirmado == 1) {
                        $_Confirmado = "Sim";
                    } else if ($individual->confirmado == 0) {
                        $_Confirmado = "Não";
                    } else {
                        $_Confirmado = "Não informado";
                    }

                    echo '<tr>'
                    . '<td class="col-md-1">' . $_Convite . '</td>'
                    . '<td class="col-md-5">' . $_Nome . '</td>'
                    . '<td>' . $_Familia . '</td>'
                    . '<td>' . $_Genero . '</td>'
                    . '<td>' . $_Confirmado . '</td>'
                    . '<td class="col-md-2">' . MakeLinkOptions($individual->id) . '</td>'
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
