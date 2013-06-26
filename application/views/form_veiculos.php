<!-- Content -->
<div id="content" class="container-fluid">
    <h2><?php echo $breadcrumb;?> Veículo</h2>
    <form class="form-horizontal" action="<?php echo base_url().$pagina?>/salvar_alteracao" method="post">
        <div class="mensagem informacao"><span>Os campos com * são de preenchimento obrigatório.</span></div>
        <div class="errorHandler">
            <?php echo $this->form_validation->error_string('- ', '<br />', '<div class="alert alert-error">', '</div>'); ?>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="selectClientes">Cliente * :</label>
                    <div class="controls">
                        <select name="idcliente" id="selectClientes" class="input-xlarge">
                            <option value="">selecione</option>
                            <?php
                            foreach ($clientes as $cliente) {
                                echo "<option value='{$cliente->id}' ".setValueDefault($cliente->id, $record->idcliente, 'select').">";
                                    echo utf8_decode($cliente->nome);
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
                    <label class="control-label" for="selectMarcas">Marca * :</label>
                    <div class="controls">
                        <select name="idmarca" id="selectMarcas" class="input-xlarge">
                            <option value="">selecione</option>
                            <?php
                            foreach ($marcas as $marca) {
                                echo "<option value='{$marca->id}' ".setValueDefault($marca->id, $record->idmarca, 'select').">";
                                    echo utf8_decode($marca->descricao);
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
                    <label class="control-label" for="selectModelos">Modelo * :</label>
                    <div class="controls">
                        <select name="idmodelo" id="selectModelos" class="input-xlarge">
                            <option value="">selecione</option>
                            <?php
                            foreach ($modelos as $modelo) {
                                echo "<option value='{$modelo->id}' ".setValueDefault($modelo->id, $record->idmodelo, 'select').">";
                                    echo utf8_decode($modelo->descricao);
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
                    <label class="control-label" for="selectCombustivel">Combustível * :</label>
                    <div class="controls">
                        <select name="idcombustivel" id="selectCombustivel" class="input-xlarge">
                            <option value="">selecione</option>
                            <?php
                            foreach ($combustiveis as $combustivel) {
                                echo "<option value='{$combustivel->id}' ".setValueDefault($combustivel->id, $record->idcombustivel, 'select').">";
                                    echo utf8_decode($combustivel->descricao);
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
                    <label class="control-label" for="cor">Cor:</label>
                    <div class="controls"><input type="text" id="cor" name="cor" value="<?php echo utf8_decode($record->cor)?>" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="placa">Placa:</label>
                    <div class="controls"><input type="text" id="placa" name="placa" value="<?php echo utf8_decode($record->placa)?>" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="ano">Ano:</label>
                    <div class="controls"><input type="text" id="ano" name="ano" value="<?php echo utf8_decode($record->ano)?>" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="motor">Motor:</label>
                    <div class="controls"><input type="text" id="motor" name="motor" value="<?php echo utf8_decode($record->motor)?>" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="observacoes">Observações:</label>
                    <div class="controls"><textarea rows="8" class="input-maxlarge" id="comentarios" name="comentarios"><?php echo utf8_decode($record->comentarios)?></textarea></div>
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
<script>
    $().ready(function() {
        Sistema.setValidatorDefaults('.errorHandler', '<div class="alert alert-error"><strong>Ooops!</strong> Preencha todos os campos para continuar.</div>');
        $("#form-horizontal").validate();
    });
</script>