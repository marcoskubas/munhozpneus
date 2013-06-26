<!-- Content -->
<div id="content" class="container-fluid">
    <h2><?php echo $breadcrumb;?> Combustível</h2>
    <form class="form-horizontal" action="<?php echo base_url().$pagina?>/salvar_alteracao" method="post">
        <div class="mensagem informacao"><span>Os campos com * são de preenchimento obrigatório.</span></div>
        <div class="errorHandler">
            <?php echo $this->form_validation->error_string('- ', '<br />', '<div class="alert alert-error">', '</div>'); ?>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="descricao">Combustível * :</label>
                    <div class="controls"><input type="text" id="descricao" name="descricao" value="<?php echo utf8_decode($record->descricao)?>" class="input-maxlarge" /></div>
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