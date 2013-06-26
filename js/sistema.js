var Sistema = {
    sorterTinytable: '',
    baseUrl: '',
    pageSelect : '',
    init : function(){
        //Habilita vari�veis padr�o
        Sistema.setDefault();
        //Habilita Dialog Message
        Sistema.setDialogView();
        //Habilita checkin checkbos's ao selecionar linhas tabelas
        $('.tinytable tbody tr td:not(:has(.checker))').click(function(){
            var $this = $(this);
            var $tr = $this.parent('tr');
            var check = $tr.find('.checker[id^=uniform-row] .checked').length;
            if(check == 0){
                $tr.find('input[type=checkbox]').attr('checked', true);
                $tr.find('.checker[id^=uniform-row] span').addClass('checked');
            }else{
                $tr.find('input[type=checkbox]').attr('checked', false);
                $tr.find('.checker[id^=uniform-row] span').removeClass('checked');
            }
        });
        
        //Habilita a��o bot�o Novo
        $('.btn-new').click(function(){
            Sistema.setBtnNew();
        }); 
        //Habilita a��o bot�o Editar
        $('.btn-edit').click(function(){
            Sistema.setBtnEdit();
        }); 
        //Habilita a��o bot�o Excluir
        $('.btn-delete').click(function(){
            Sistema.setBtnDelete();
        });
        //Habilita a��o bot�o Visualizar
        $('.btn-view').click(function(){
            Sistema.setBtnView();
        });
        //Habilita a��o bot�o Imprimir
        $('.btn-print').click(function(){
            Sistema.setBtnPrint();
        });
        //Habilita a��o bot�o Imprimir Relat�rio atual
        $('.btn-print-refresh').click(function(){
            Sistema.setPrintRefresh();
        });
        //Habilita a��o bot�o Voltar
        $('.btn-back').click(function(){
            Sistema.setBtnBack();
        });
        //Habilita ac�o bot�o Adicionar Produto
        $('#btn-addproduct').click(function(){
            Sistema.setAddProduct();
        });
        //Habilita exclus�o item
        $('.icon-remove-product').click(function(){
            var $td = $(this).parent('td');
            var $tr = $td.parent('tr');
            var idItem = $tr.find('.id-product').html();
            Sistema.setDeleteItem(idItem);
            $tr.fadeOut('slow');
        });
        //Habilita ac�o bot�o Adicionar Produto
        $('#btn-addservice').click(function(){
            Sistema.setAddService();
        });
        //Habilita exclus�o item
        $('.icon-remove-service').click(function(){
            var $td = $(this).parent('td');
            var $tr = $td.parent('tr');
            var idItem = $tr.find('.id-service').html();
            Sistema.setDeleteItem(idItem);
            $tr.fadeOut('slow');
        });
    },
    setDefault : function(){
        Sistema.baseUrl     = $('#base-url').val();
        Sistema.pageSelect  = $("#select-page").val();
    },
    setAddProduct : function(){
        var idAgenda    = $('#id').val();
        var idProduto   = $('#selectProdutos').val();
        var qtdeProduto = $('#quantidadeProduto').val();
        var action  = Sistema.baseUrl+'actions/addproduct/'+idAgenda+'/'+idProduto+'/'+qtdeProduto;
        //Envia requisi��o e retorna resultado
        $.ajax({
            url         : action,
            type        : 'GET',
            contentType : 'application/x-www-form-urlencoded; charset=ISO-8859-1',
            success : function(data){
                $('#tabela-produtos tbody').fadeIn().append(data);
            }
        });
    },
    setAddService: function(){
        var idAgenda    = $('#id').val();
        var idServico   = $('#selectServicos').val();
        var qtdeServico = $('#quantidadeServico').val();
        var action  = Sistema.baseUrl+'actions/addservice/'+idAgenda+'/'+idServico+'/'+qtdeServico;
        //Envia requisi��o e retorna resultado
        $.ajax({
            url         : action,
            type        : 'GET',
            contentType : 'application/x-www-form-urlencoded; charset=ISO-8859-1',
            success : function(data){
                $('#tabela-servicos tbody').fadeIn().append(data);
            }
        });
    },
    setDeleteItem : function(idItem){
        var action  = Sistema.baseUrl+'actions/deleteitem/'+idItem;
        //Envia requisi��o e retorna resultado
        $.ajax({
            url         : action,
            type        : 'GET',
            contentType : 'application/x-www-form-urlencoded; charset=ISO-8859-1',
            success : function(data){
                
            }
        });
    },
    setBtnNew : function(){
        location.href = Sistema.baseUrl+Sistema.pageSelect+'/cadastro';
    },
    setBtnEdit : function(){
        var countCheck = $('.checker[id^=uniform-row] .checked').length;
        if(countCheck == 0){
            Sistema.setMessage('Nenhum registro selecionado!', 'aviso');
        }else if(countCheck == 1){
            var id = $('.checker[id^=uniform-row] .checked').find('input').val();
            location.href = Sistema.baseUrl+Sistema.pageSelect+'/editar/'+id;
        }else{
            Sistema.setMessage('Mais de um registro selecionado, selecione apenas um registro!', 'aviso');
        }
    },
    setBtnDelete : function(){
        var countCheck = $('.checker[id^=uniform-row] .checked').length;
        if(countCheck == 0){
            Sistema.setMessage('Nenhum registro selecionado!', 'aviso');
        }else if(countCheck == 1){
            var id = $('.checker[id^=uniform-row] .checked').find('input').val();
            location.href = Sistema.baseUrl+Sistema.pageSelect+'/excluir/'+id;
        }else{
            Sistema.setMessage('Mais de um registro selecionado, selecione apenas um registro!', 'aviso');
        }
    },
    setBtnView : function(){
        var countCheck = $('.checker[id^=uniform-row] .checked').length;
        if(countCheck == 0){
            Sistema.setMessage('Nenhum registro selecionado!', 'aviso');
        }else if(countCheck == 1){
            var id = $('.checker[id^=uniform-row] .checked').find('input').val();
            var action  = Sistema.baseUrl+Sistema.pageSelect+'/preview/'+id;
            //Envia requisi��o e retorna resultado
            $.ajax({
                url         : action,
                type        : 'GET',
                contentType : 'application/x-www-form-urlencoded; charset=ISO-8859-1',
                success : function(data){
                    Sistema.openDialogView(data);
                }
            });
        }else{
            Sistema.setMessage('Mais de um registro selecionado, selecione apenas um registro!', 'aviso');
        }
    },
    setBtnPrint : function(){
        var countCheck = $('.checker[id^=uniform-row] .checked').length;
        if(countCheck == 0){
            Sistema.setMessage('Nenhum registro selecionado!', 'aviso');
        }else if(countCheck == 1){
            var id = $('.checker[id^=uniform-row] .checked').find('input').val();
            var action  = Sistema.baseUrl+'impressao/'+Sistema.pageSelect+'/'+id;
            Sistema.setRedirect(action);
        }else{
            Sistema.setMessage('Mais de um registro selecionado, selecione apenas um registro!', 'aviso');
        }
    },
    setPrintRefresh : function(){
        window.print();
    },
    setRedirect : function(url_action){
        location.href = url_action;
    },
    setBtnBack : function(){
        location.href = Sistema.baseUrl+Sistema.pageSelect;
    },
    setUniform : function(){
        $("input.jsform, select.jsform, textarea.jsform").uniform();
    },
    setMessage : function(message, tipo){
        if(tipo === ''){
            $('.mensagem').removeClass('aviso sucesso informacao erro').fadeOut('slow');
        }else{
            $('.mensagem').removeClass('hidden aviso sucesso informacao erro').addClass(tipo).fadeIn('slow');
            $('.mensagem').html('<span>'+message+'</span>');   
        }
    },
    openDialogView : function(conteudo){
      $('#content-message').html(conteudo);
      $('#dialog-message').dialog({ 
                                    'autoOpen' : true, 
                                    'title': 'Visualiza��o Registro'
                                   });
    },
    setDialogView: function() {
        $("#dialog-message").dialog({
            autoOpen: false,
            modal: true,
            width: 500,
            height: 350,
            buttons: [
                {
                    text: "Fechar",
                    click: function() {
                        $(this).dialog("close");
                    }
                }
            ]

        });
    },
    setTinytable : function(records){
        // Oculta mensagens tempor�rias
        setTimeout( "Sistema.setMessage('', '')", 3000);
        // Formata configura��es Tinytable
        var Start = true;
        if(records === '0'){
            Start = false;
        }
        Sistema.sorterTinytable = new TINY.table.sorter('sorter','table',{
            headclass:'head',
            ascclass:'asc',
            descclass:'desc',
            evenclass:'evenrow',
            oddclass:'oddrow',
            evenselclass:'evenselected',
            oddselclass:'oddselected',
            paginate:true,
            size:10,
            colddid:'columns',
            currentid:'currentpage',
            totalid:'totalpages',
            startingrecid:'startrecord',
            endingrecid:'endrecord',
            totalrecid:'totalrecords',
            hoverid:'selectedrow',
            pageddid:'pagedropdown',
            navid:'tablenav',
            sortcolumn:1,
            sortdir:1,
            init: Start
        });
        return Sistema.sorterTinytable;
    }
};
$(Sistema.init);