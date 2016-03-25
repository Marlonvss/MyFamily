<link rel="stylesheet" href="./css/mensagem_css.css" type="text/css">
<script type="text/javascript" src="./js/mensagem_js.js"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 text-center">
            <h2 class="section-heading">Nos deixe uma mensagem!</h2>
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
            <hr class="primary" id="loaded">
            <form id="form_mensagem">
                <div class="form-group">
                    <span>Informe seu nome</span>
                    <input type="text" class="form-control" name="nome" id="nome" maxlength="100" />
                </div>
                <div class="form-group">
                    <span>Informe seu email</span>
                    <input type="email" class="form-control" name="email" id="email" maxlength="100" />
                </div>
                <div class="form-group">
                    <span>Escreva sua mensagem</span>
                    <textarea oninput="Mensagem_refreshCaracters()" class="form-control" maxlength="200" name="mensagem" id="mensagem" rows="5"></textarea>
                </div>
                <div id="contador">200 Restantes</div>
                <button type="button" onclick="Mensagem_addMensagem()" class="btn btn-primary btn-xl" id="enviar">Enviar</button>
            </form>

        </div>
    </div>
</div>
