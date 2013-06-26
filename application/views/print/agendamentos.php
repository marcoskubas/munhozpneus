<!-- Content -->
<div id="content" class="container-fluid">
    <div class='header-print'>
        <h2>Relatório Agendamento / Orçamento</h2>
        <div class="actions-impressao fRight">
            <button type="button" class="btn btn-back">&laquo; Voltar</button>
            <button type="button" class="btn btn-print-refresh"><i class="icon-print"></i> Imprimir</button>
        </div>
    </div>
    <div id="div-print">
        <table class="rel-impressao table">
        <tr>
            <td class="left-header">
                <img src="<?php echo base_url()?>images/logo_munhoz.png" width="150" />
            </td>
            <td class="right-header">
                <p>
                    <strong>
                        Fone: (51) 3491-7770 (51) 3402-1683 <br />
                        Av. Nestor de Moura Jardim, 1340 - Colina - CEP 92500-000 - Guaíba - RS
                    </strong>
                </p>
            </td>
        </tr>    
        <tr>
            <td colspan="2" class="row-center">
                <p><strong>ORÇAMENTO N.º <?php echo number_complete($record->id)?></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"><p><strong>Cliente: </strong></p> </div>
                        <div class="span10"><p><?php echo utf8_decode($cliente->nome)?></p></div>
                    </div>    
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"><p><strong>CPF: </strong></p> </div>
                        <div class="span2"><p><?php echo $cliente->cpf?></p></div>
                        <div class="span2"><p><strong>Endereço: </strong></p> </div>
                        <div class="span2"><p><?php echo utf8_decode($cliente->endereco)?></p></div>
                        <div class="span2"><p><strong>Complemento: </strong></p> </div>
                        <div class="span2"><p><?php echo utf8_decode($cliente->complemento)?></p></div>
                    </div>    
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"><p><strong>Bairo: </strong></p> </div>
                        <div class="span2"><p><?php echo $cliente->bairro?></p></div>
                        <div class="span2"><p><strong>Cidade: </strong></p> </div>
                        <div class="span2"><p><?php echo utf8_decode($cliente->cidade)?></p></div>
                        <div class="span2"><p><strong>UF: </strong></p> </div>
                        <div class="span2"><p><?php echo utf8_decode($cliente->estado)?></p></div>
                    </div>    
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"><p><strong>Telefone: </strong></p> </div>
                        <div class="span2"><p><?php echo utf8_decode($cliente->telefone)?></p></div>
                        <div class="span2"><p><strong>Celular: </strong></p> </div>
                        <div class="span6"><p><?php echo utf8_decode($cliente->celular)?></p></div>
                    </div>    
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span1"><p><strong>Veículo: </strong></p> </div>
                        <div class="span2"><p><?php echo utf8_decode($veiculo->marca)?> <?php echo utf8_decode($veiculo->modelo)?></p></div>
                        <div class="span1"><p><strong>Cor: </strong></p> </div>
                        <div class="span2"><p><?php echo utf8_decode($veiculo->cor)?></p></div>
                        <div class="span1"><p><strong>Ano: </strong></p> </div>
                        <div class="span2"><p><?php echo utf8_decode($veiculo->ano)?></p></div>
                        <div class="span1"><p><strong>Placa: </strong></p> </div>
                        <div class="span2"><p><?php echo utf8_decode($veiculo->placa)?></p></div>
                    </div>    
                </div>
            </td>
        </tr>
        </table>
        
        <table class="rel-impressao table">
        <tr>
            <td><p><strong>QUANT.</strong></p></td>
            <td><p><strong>DESCRIÇÃO DO MATERIAL</strong></p></td>
            <td><p><strong>R$ UNIT.</strong></p></td>
            <td><p><strong>R$ VALOR</strong></p></td>
        </tr>    
        <?php 
        $total_produtos = 0;
        foreach ($itens_produtos as $produto) { 
            $valor_total = $produto->quantidade * $produto->valor;
            $total_produtos += $valor_total;
        ?>
        <tr>
            <td><p><?php echo $produto->quantidade?></p></td>
            <td><p><?php echo utf8_decode($produto->descricao)?></p></td>
            <td><p><?php echo NumberFormat($produto->valor)?></p></td>
            <td><p><?php echo NumberFormat($valor_total)?></p></td>
        </tr>    
        <?php }?>
        </table>
        
        <table class="rel-impressao table">
        <tr>
            <td><p><strong>QUANT.</strong></p></td>
            <td><p><strong>DESCRIÇÃO DOS SERVIÇOS</strong></p></td>
            <td><p><strong>R$ UNIT.</strong></p></td>
            <td><p><strong>R$ VALOR</strong></p></td>
        </tr>    
        <?php 
        $total_servicos = 0;
        foreach ($itens_servicos as $servico) { 
            $valor_total = $servico->quantidade * $servico->valor;
            $total_servicos += $valor_total;
        ?>
        <tr>
            <td><p><?php echo $servico->quantidade?></p></td>
            <td><p><?php echo utf8_decode($servico->descricao)?></p></td>
            <td><p><?php echo NumberFormat($servico->valor)?></p></td>
            <td><p><?php echo NumberFormat($valor_total)?></p></td>
        </tr>    
        <?php }?>
        </table>
        
        <table class="rel-impressao table">
        <tr>
            <td>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"><p><strong>Data do Orçamento: </strong></p> </div>
                        <div class="span4"><p><?php echo date('d/m/Y H:i')?></p></div>
                        <div class="span1"><p><strong>Material: </strong></p> </div>
                        <div class="span5"><p><?php echo NumberFormat($total_produtos)?></p></div>
                    </div>    
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"></div>
                        <div class="span4"></div>
                        <div class="span1"><p><strong>Serviços: </strong></p> </div>
                        <div class="span5"><p><?php echo NumberFormat($total_servicos)?></p></div>
                    </div>    
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"></div>
                        <div class="span4"></div>
                        <div class="span1"><p><strong>TOTAL: </strong></p> </div>
                        <div class="span5"><p><?php echo NumberFormat($total_servicos+$total_produtos)?></p></div>
                    </div>    
                </div>
            </td>
        </tr>    
        </table>
    </div>
</div>
<!-- /Content -->