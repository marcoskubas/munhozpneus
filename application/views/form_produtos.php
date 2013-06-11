<!-- Content -->
<div id="content" class="container-fluid">
    <h2>Cadastrar Produto</h2>
    <form class="form-horizontal">
        <div class="mensagem informacao"><span>Os campos com * s�o de preenchimento obrigat�rio.</span></div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="descricao">Produto:</label>
                    <div class="controls"><input type="text" id="descricao" class="input-maxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="valor">Valor Unit�rio:</label>
                    <div class="controls"><input type="text" id="valor" class="input-medium" /><span class="infoForm">(Ex.: R$ 5,00)</span></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="observacoes">Observa��es:</label>
                    <div class="controls"><textarea rows="8" class="input-maxlarge"></textarea></div>
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