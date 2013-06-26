<!-- Content -->
<div id="content" class="container-fluid">
    <h2><?php echo $breadcrumb;?> Agendamento / Orçamento</h2>
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
                    <label class="control-label" for="selectVeiculos">Veículo * :</label>
                    <div class="controls">
                        <select name="idveiculo" id="selectVeiculos" class="maxlarge">
                            <option value="">selecione</option>
                            <?php
                            foreach ($veiculos as $veiculo) {
                                echo "<option value='{$veiculo->id}' ".setValueDefault($veiculo->id, $record->idveiculo, 'select').">";
                                    echo utf8_decode($veiculo->modelo)." - ".$veiculo->placa;
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
                    <label class="control-label" for="data">Data * :</label>
                    <div class="controls"><input type="text" id="data_agenda" name="data_agenda" value="<?php echo tinydateFormat($record->data_agenda)?>" class="input-medium" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="hora">Hora * :</label>
                    <div class="controls"><input type="text" id="hora_agenda" name="hora_agenda" value="<?php echo utf8_decode($record->hora_agenda)?>" class="input-medium" /></div>
                </div>
            </div>
        </div>
         <?php
        if( isset($record->id)){
        ?>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <fieldset name="produtos">
                        <legend>Produtos:</legend>
                        <div class="control-group">
                            <label class="control-label" for="nomeProduto">Produto:</label>
                            <div class="controls">
                                <select id="selectProdutos" class="maxlarge">
                                    <option value="">selecione</option>
                                    <?php
                                    foreach ($produtos as $produto) {
                                        echo "<option value='{$produto->id}'>".utf8_decode($produto->descricao)."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="quantidadeProduto">Quantidade:</label>
                            <div class="controls"><input type="text" id="quantidadeProduto" class="input-medium" /></div>
                        </div>
                        <div class="control-group">
                            <div class="controls"><button type="button" class="btn btn-primary" id="btn-addproduct">Adicionar</button></div>
                        </div>
                        <div class="control-group">
                            <table class="tabela" id="tabela-produtos">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($itens_produtos as $item_produto) {
                                ?>
                                <tr class="odd">
                                    <td width="5%" class="id-product"><?php echo $item_produto->id?></td>
                                    <td><?php echo utf8_decode($item_produto->descricao)?></td>
                                    <td width="25%"><?php echo $item_produto->quantidade?></td>
                                    <td width="10%"><a href="javascript:void(0)" class="icon-remove icon-remove-product" title="Remover"></a></td>
                                </tr>    
                                <?php
                                }
                                ?>    
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <fieldset name="produtos">
                        <legend>Serviços:</legend>
                        <div class="control-group">
                            <label class="control-label" for="nomeServiço">Nome do Serviço:</label>
                            <div class="controls">
                                <select id="selectServicos" class="maxlarge">
                                    <option value="">selecione</option>
                                    <?php
                                    foreach ($servicos as $servico) {
                                        echo "<option value='{$servico->id}'>".utf8_decode($servico->descricao)."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="quantidadeServiço">Quantidade:</label>
                            <div class="controls"><input type="text" id="quantidadeServico" class="input-medium" /></div>
                        </div>
                        <div class="control-group">
                            <div class="controls"><button type="button" class="btn btn-primary" id="btn-addservice">Adicionar</button></div>
                        </div>
                        <div class="control-group">
                            <table class="tabela" id="tabela-servicos">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Serviço</th>
                                        <th>Quantidade</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($itens_servicos as $item_servico) {
                                ?>
                                <tr class="odd">
                                    <td width="5%" class="id-service"><?php echo $item_servico->id?></td>
                                    <td><?php echo utf8_decode($item_servico->descricao)?></td>
                                    <td width="25%"><?php echo $item_servico->quantidade?></td>
                                    <td width="10%"><a href="javascript:void(0)" class="icon-remove icon-remove-service" title="Remover"></a></td>
                                </tr>    
                                <?php
                                }
                                ?>     
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
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