<!-- Content -->
<div id="content" class="container-fluid">
    <h2>Agendamentos / Orçamentos</h2>
    <form class="box-example form-horizontal">
        <div class="mensagem informacao"><span>Os campos com * são de preenchimento obrigatório.</span></div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="nomeCliente">Cliente:</label>
                    <div class="controls"><input type="text" id="nomeCliente" class="input-xxlarge" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="selectVeiculos">Veículo:</label>
                    <div class="controls">
                        <select name="veiculos" id="selectVeiculos" class="input-xxlarge">
                            <option>selecione</option>
                            <option>Renault Clio</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <fieldset name="produtos">
                        <legend>Produtos:</legend>
                        <div class="control-group">
                            <label class="control-label" for="nomeProduto">Nome do Produto:</label>
                            <div class="controls"><input type="text" id="nomeProduto" class="input-xlarge" /></div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="quantidadeProduto">Quantidade:</label>
                            <div class="controls"><input type="text" id="quantidadeProduto" class="input-xlarge" /></div>
                        </div>
                        <div class="control-group">
                            <div class="controls"><button type="submit" class="btn btn-primary">Adicionar</button></div>
                        </div>
                        <div class="control-group">
                            <table class="tabela">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd">
                                        <td width="5%">1</td>
                                        <td>Pneus</td>
                                        <td width="25%">4</td>
                                        <td width="10%"><a href="#" class="icon-remove" title="Remover"></a></td>
                                    </tr>
                                    <tr class="even">
                                        <td width="5%">1</td>
                                        <td>Pneus</td>
                                        <td width="25%">4</td>
                                        <td width="10%"><a href="#" class="icon-remove" title="Remover"></a></td>
                                    </tr>
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
                            <div class="controls"><input type="text" id="nomeServiço" class="input-xlarge" /></div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="quantidadeServiço">Quantidade:</label>
                            <div class="controls"><input type="text" id="quantidadeServiço" class="input-xlarge" /></div>
                        </div>
                        <div class="control-group">
                            <div class="controls"><button type="submit" class="btn btn-primary">Adicionar</button></div>
                        </div>
                        <div class="control-group">
                            <table class="tabela">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Serviço</th>
                                        <th>Quantidade</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd">
                                        <td width="5%">1</td>
                                        <td>Mão de Obra</td>
                                        <td width="25%">4</td>
                                        <td width="10%"><a href="#" class="icon-remove" title="Remover"></a></td>
                                    </tr>
                                    <tr class="even">
                                        <td width="5%">1</td>
                                        <td>Mão de Obra</td>
                                        <td width="25%">4</td>
                                        <td width="10%"><a href="#" class="icon-remove" title="Remover"></a></td>
                                    </tr>
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
                    <label class="control-label" for="data">Data:</label>
                    <div class="controls"><input type="text" id="data" class="input-medium" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <label class="control-label" for="hora">Hora:</label>
                    <div class="controls"><input type="text" id="hora" class="input-medium" /></div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <div class="controls"><button type="submit" class="btn btn-primary">Salvar</button></div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /Content -->