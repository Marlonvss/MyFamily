<link rel="stylesheet" href="./css/convidados_css.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="./js/convidados_js.js"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 text-center">
            <h2 class="section-heading">Confirmação de presença</h2>
            <div class="cssload-container" id="loading">
                <div class="cssload-shaft1"></div>
                <div class="cssload-shaft2"></div>
                <div class="cssload-shaft3"></div>
                <div class="cssload-shaft4"></div>
                <div class="cssload-shaft5"></div>
                <div class="cssload-shaft6"></div>
                <div class="cssload-shaft7"></div>
                <div class="cssload-shaft8"></div>
                <div class="cssload-shaft9"></div>
                <div class="cssload-shaft10"></div>
            </div>    
            <hr class="light" id="loaded">
            <div id="part_one">
                <p class="text-faded">Para confirmar sua presença basta informar abaixo o número que veio em seu convite, nós iremos listar todos os convidados encaminhados para este convite e você poderá confirmar a presença de cada um deles!</p>
                <form id="form_convite">
                    <div class="form-group">
                        <input type="number" class="form-control" id="convite" name="convite">
                    </div>
                    <button type="button" onclick="Convidado_loadConvidados()" class="btn btn-default btn-xl" id="confirmar">Confirmar</button>
                </form>
            </div>
            <div id="part_two">
                <a href="javascript:#" onclick="Convidado_backConvidados()"><span class="glyphicon glyphicon-chevron-down"></span></a>
                <div class="table-responsive">
                    <table class="table" id="tableConvidados">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Confirmado</th>
                                <th>Data da confirmação</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>        
                </div>
            </div>
        </div>
    </div>
</div>
