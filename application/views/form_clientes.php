<!-- Content -->
<div id="content" class="container-fluid">
    <h2>Cadastrar Cliente</h2>
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
                    <label class="control-label" for="cpf">CPF:</label>
                    <div class="controls"><input type="text" id="cpf" class="input-xxlarge" /></div>
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
                    <label class="control-label" for="endereco">Endereço:</label>
                    <div class="controls"><input type="text" id="endereco" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="numero">Número:</label>
                    <div class="controls"><input type="text" id="numero" class="input-medium" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="complemento">Complemento:</label>
                    <div class="controls"><input type="text" id="complemento" class="input-medium" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="bairro">Bairro:</label>
                    <div class="controls"><input type="text" id="bairro" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="selectCidades">Cidade:</label>
                    <div class="controls">
                        <select name="veiculos" id="selectCidades" class="input-xlarge">
                            <option>selecione</option>
                            <option>Guaíba</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="selectEstado">Estado:</label>
                    <div class="controls">
                        <select name="veiculos" id="selectEstado" class="input-xlarge">
                            <option>selecione</option>
                            <option>Rio Grande do Sul</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="residencial">Telefone Residencial:</label>
                    <div class="controls"><input type="text" id="residencial" class="input-medium" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="celular">Celular:</label>
                    <div class="controls"><input type="text" id="celular" class="input-medium" /></div>
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