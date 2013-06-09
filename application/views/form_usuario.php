<!-- Content -->
<div id="content" class="container-fluid">
    <h2>Cadastrar Usuário</h2>
    <form class="form-horizontal">
        <div class="mensagem informacao"><span>Os campos com * são de preenchimento obrigatório.</span></div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="nome">Nome:</label>
                    <div class="controls"><input type="text" id="nome" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="telefone">Telefone:</label>
                    <div class="controls"><input type="text" id="telefone" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="email">E-mail:</label>
                    <div class="controls"><input type="text" id="email" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="senha">Senha:</label>
                    <div class="controls"><input type="password" id="senha" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="confirmarSenha">Confirmar Senha:</label>
                    <div class="controls"><input type="password" id="confirmarSenha" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span3">
                <div class="control-group">
                    <label class="control-label">Ativar Usuário:</label>
                    <div class="controls">
                        <label class="radio" for="sim"><input type="radio" name="ativarUsuario" id="sim">Sim</label>
                        <label class="radio" for="nao"><input type="radio" name="ativarUsuario" id="nao">Não</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <div class="controls">
                        <button type="button" class="btn btn-back">&laquo; Voltar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <input type="hidden" name="id" id="id" value="<?php echo $record->id?>" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /Content -->