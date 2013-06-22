<!-- Content -->
<div id="content" class="container-fluid">
    <h2><?php echo $breadcrumb;?> Usu�rio</h2>
    <form class="form-horizontal" action="<?php echo base_url().$pagina?>/salvar_alteracao" method="post">
        <div class="mensagem informacao"><span>Os campos com * s�o de preenchimento obrigat�rio.</span></div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="nome">Nome:</label>
                    <div class="controls"><input type="text" id="name" name="name" value="<?php echo utf8_decode($record->name)?>" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="telefone">Telefone:</label>
                    <div class="controls"><input type="text" id="phone" name="phone" value="<?php echo utf8_decode($record->phone)?>" class="input-xxlarge" /></div>
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
                    <label class="control-label" for="senha">Senha:</label>
                    <div class="controls"><input type="password" id="pasw" name="pasw" value="" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="confirmarSenha">Confirmar Senha:</label>
                    <div class="controls"><input type="password" id="conpassword" name="conpassword" value="" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span3">
                <div class="control-group">
                    <label class="control-label">Bloquear usu�rio:</label>
                    <div class="controls">
                        <label class="radio" for="sim"><input type="radio" name="block" id="sim" value="Y" <?php echo setValueDefault('Y', $record->block, 'radio')?>>Sim</label>
                        <label class="radio" for="nao"><input type="radio" name="block" id="nao" value="N" <?php echo setValueDefault('N', $record->block, 'radio')?>>N�o</label>
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