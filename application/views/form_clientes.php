<!-- Content -->
<div id="content" class="container-fluid">
    <h2><?php echo $breadcrumb;?> Cliente</h2>
    <form class="form-horizontal" action="<?php echo base_url().$pagina?>/salvar_alteracao" method="post">
        <div class="mensagem informacao"><span>Os campos com * são de preenchimento obrigatório.</span></div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="nome">Nome:</label>
                    <div class="controls"><input type="text" id="nome" name="nome" value="<?php echo utf8_decode($record->nome)?>" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="cpf">CPF:</label>
                    <div class="controls"><input type="text" id="cpf" name="cpf" value="<?php echo utf8_decode($record->cpf)?>" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="email">E-mail:</label>
                    <div class="controls"><input type="text" id="email" name="email" value="<?php echo utf8_decode($record->email)?>" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="endereco">Endereço:</label>
                    <div class="controls"><input type="text" id="endereco" name="endereco" value="<?php echo utf8_decode($record->endereco)?>" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="numero">Número:</label>
                    <div class="controls"><input type="text" id="numero" name="numero" value="<?php echo utf8_decode($record->numero)?>" class="input-medium" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="complemento">Complemento:</label>
                    <div class="controls"><input type="text" id="complemento" name="complemento" value="<?php echo utf8_decode($record->complemento)?>" class="input-medium" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="bairro">Bairro:</label>
                    <div class="controls"><input type="text" id="bairro" name="bairro" value="<?php echo utf8_decode($record->bairro)?>" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="selectEstado">Estado:</label>
                    <div class="controls">
                        <select name="idestado" id="selectEstado" class="input-xlarge">
                            <option value="0">selecione</option>
                            <?php
                            foreach ($estados as $estado) {
                                echo "<option value='{$estado->id}' ".setValueDefault($estado->id, $record->idestado, 'select').">";
                                    echo utf8_decode($estado->descricao);
                                echo "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="selectCidades">Cidade:</label>
                    <div class="controls">
                        <select name="idcidade" id="selectCidades" class="input-xlarge">
                            <option value="0">selecione</option>
                            <?php
                            foreach ($cidades as $cidade) {
                                echo "<option value='{$cidade->id}' ".setValueDefault($cidade->id, $record->idcidade, 'select').">";
                                    echo utf8_decode($cidade->descricao);
                                echo "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="residencial">Telefone Residencial:</label>
                    <div class="controls"><input type="text" id="telefone" name="telefone" value="<?php echo utf8_decode($record->telefone)?>" class="input-medium" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="celular">Celular:</label>
                    <div class="controls"><input type="text" id="celular" name="celular" value="<?php echo utf8_decode($record->celular)?>" class="input-medium" /></div>
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