<!-- Content -->
<div id="content" class="container-fluid">
    <h2>Cadastrar Servi�o</h2>
    <form class="form-horizontal" action="<?php echo base_url()?>servicos/salvar_alteracao" method="post">
        <div class="mensagem informacao"><span>Os campos com * s�o de preenchimento obrigat�rio.</span></div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="descricao">Servi�o:</label>
                    <div class="controls"><input type="text" name="descricao" id="descricao" class="input-maxlarge" value="<?php echo utf8_decode($record->descricao)?>" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="valor">Valor Unit�rio:</label>
                    <div class="controls"><input type="text" name="valor" id="valor" class="input-medium" value="<?php echo $record->valor?>" /><span class="infoForm">(Ex.: R$ 5,00)</span></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="observacoes">Observa��es:</label>
                    <div class="controls"><textarea rows="8" name="comentarios" id="comentarios" class="input-maxlarge"><?php echo utf8_decode($record->comentarios)?></textarea></div>
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