var Sistema = {
    sorterTinytable: '',
    baseUrl: '',
    pageSelect : '',
    init : function(){
        //Habilita variáveis padrão
        Sistema.setDefault();
        //Habilita checkin checkbos's ao selecionar linhas tabelas
        $('.tinytable tbody tr').click(function(){
            var check = $(this).find('.checker[id^=uniform-row] .checked').length;
            if(check == 0){
                $(this).find('input[type=checkbox]').attr('checked', true);
                $(this).find('.checker[id^=uniform-row] span').addClass('checked');
            }else{
                $(this).find('input[type=checkbox]').attr('checked', false);
                $(this).find('.checker[id^=uniform-row] span').removeClass('checked');
            }
        });
        //Habilita ação botão Novo
        $('.btn-new').click(function(){
            Sistema.setBtnNew();
        }); 
        //Habilita ação botão Editar
        $('.btn-edit').click(function(){
            Sistema.setBtnEdit();
        }); 
        //Habilita ação botão Excluir
        $('.btn-delete').click(function(){
            Sistema.setBtnDelete();
        });
        //Habilita ação botão Visualizar
        $('.btn-view').click(function(){
            Sistema.setBtnView();
        });
        //Habilita ação botão Imprimir
        $('.btn-print').click(function(){
            Sistema.setBtnPrint();
        });
        //Habilita ação botão Voltar
        $('.btn-back').click(function(){
            Sistema.setBtnBack();
        });
    },
    setDefault : function(){
        Sistema.baseUrl     = $('#base-url').val();
        Sistema.pageSelect  = $("#select-page").val();
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
        if(countCheck == 1){
            var id = $('.checker[id^=uniform-row] .checked').find('input').val();
            location.href = Sistema.baseUrl+Sistema.pageSelect+'/excluir/'+id;
        }
    },
    setBtnView : function(){
        Sistema.setMessage('Funcionalidade "Visualizar" não implementada!', 'aviso');
    },
    setBtnPrint : function(){
        Sistema.setMessage('Funcionalidade "Imprimir" não implementada!', 'aviso');
    },
    setBtnBack : function(){
        location.href = Sistema.baseUrl+Sistema.pageSelect;
    },
    setUniform : function(){
        $("input.jsform, select.jsform, textarea.jsform").uniform();
    },
    setMessage : function(message, tipo){
        $('.mensagem').removeClass('hidden aviso sucesso informacao erro').addClass(tipo);
        $('.mensagem').html('<span>'+message+'</span>');
    },
    setTinytable : function(records){
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