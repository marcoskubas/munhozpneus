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
                <p><strong>ORÇAMENTO N.º <?php echo (1000+$record->id)?></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"><p><strong>Cliente: </strong></p> </div>
                        <div class="span10"><p><?php echo $cliente->nome?></p></div>
                    </div>    
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"><p><strong>CPF: </strong></p> </div>
                        <div class="span2"><p>012.320.323-87</p></div>
                        <div class="span2"><p><strong>Endereço: </strong></p> </div>
                        <div class="span2"><p>Rua Ceará, 190</p></div>
                        <div class="span2"><p><strong>Complemento: </strong></p> </div>
                        <div class="span2"><p>Casa</p></div>
                    </div>    
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"><p><strong>Bairo: </strong></p> </div>
                        <div class="span2"><p>Cel. Nassuca</p></div>
                        <div class="span2"><p><strong>Cidade: </strong></p> </div>
                        <div class="span2"><p>Guaíba</p></div>
                        <div class="span2"><p><strong>UF: </strong></p> </div>
                        <div class="span2"><p>RS</p></div>
                    </div>    
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"><p><strong>CEP: </strong></p> </div>
                        <div class="span2"><p>92500-000</p></div>
                        <div class="span2"><p><strong>Telefone: </strong></p> </div>
                        <div class="span6"><p>(51) 3491.1364</p></div>
                    </div>    
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span1"><p><strong>Veículo: </strong></p> </div>
                        <div class="span2"><p>Cel. Nassuca</p></div>
                        <div class="span1"><p><strong>Cor: </strong></p> </div>
                        <div class="span2"><p>Guaíba</p></div>
                        <div class="span1"><p><strong>Ano: </strong></p> </div>
                        <div class="span2"><p>RS</p></div>
                        <div class="span1"><p><strong>Placa: </strong></p> </div>
                        <div class="span2"><p>RS</p></div>
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
        <tr>
            <td><p>2</p></td>
            <td><p>DISCO DE FREIO DO CLIO</p></td>
            <td><p>62,00</p></td>
            <td><p>124,00</p></td>
        </tr>    
        <tr>
            <td><p>1</p></td>
            <td><p>PASTILHA DE FREIO CLIO</p></td>
            <td><p>45,00</p></td>
            <td><p>45,00</p></td>
        </tr>    
        </table>
        
        <table class="rel-impressao table">
        <tr>
            <td><p><strong>QUANT.</strong></p></td>
            <td><p><strong>DESCRIÇÃO DOS SERVIÇOS</strong></p></td>
            <td><p><strong>R$ UNIT.</strong></p></td>
            <td><p><strong>R$ VALOR</strong></p></td>
        </tr>    
        <tr>
            <td><p>1</p></td>
            <td><p>MÃO-DE-OBRA SUSPENSÃO</p></td>
            <td><p>45,00</p></td>
            <td><p>45,00</p></td>
        </tr>    
        </table>
        
        <table class="rel-impressao table">
        <tr>
            <td>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"><p><strong>Data do Orçamento: </strong></p> </div>
                        <div class="span4"><p><?php echo date('d/m/Y H:i')?></p></div>
                        <div class="span1"><p><strong>Material: </strong></p> </div>
                        <div class="span5"><p>169,00</p></div>
                    </div>    
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"></div>
                        <div class="span4"></div>
                        <div class="span1"><p><strong>Serviços: </strong></p> </div>
                        <div class="span5"><p>45,00</p></div>
                    </div>    
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2"></div>
                        <div class="span4"></div>
                        <div class="span1"><p><strong>TOTAL: </strong></p> </div>
                        <div class="span5"><p><strong>214,00</strong></p></div>
                    </div>    
                </div>
            </td>
        </tr>    
        </table>
    </div>
</div>
<!-- /Content -->
<script>
    window.onload = function() {
        //Sistema.setPrintRefresh();
    };
</script>