<!-- Content -->
<div id="content" class="container-fluid">
    <h2><?php echo $breadcrumb?> Serviço</h2>
    <form class="form-horizontal" action="<?php echo base_url().$pagina?>/salvar_alteracao" method="post">
        <div class="mensagem informacao"><span>Os campos com * são de preenchimento obrigatório.</span></div>
        <div class="errorHandler">
            <?php echo $this->form_validation->error_string('- ', '<br />', '<div class="alert alert-error">', '</div>'); ?>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="descricao">Serviço * :</label>
                    <div class="controls"><input type="text" name="descricao" id="descricao" class="input-maxlarge" value="<?php echo utf8_decode($record->descricao)?>" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="valor">Valor Unitário * :</label>
                    <div class="controls"><input type="text" name="valor" id="valor" class="input-medium" value="<?php echo $record->valor?>" /><span class="infoForm">(Ex.: R$ 5,00)</span></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="observacoes">Observações:</label>
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
<script>
    $().ready(function() {
        Sistema.setValidatorDefaults('.errorHandler', '<div class="alert alert-error"><strong>Ooops!</strong> Preencha todos os campos para continuar.</div>');
        $("#form-horizontal").validate();
    });
</script>