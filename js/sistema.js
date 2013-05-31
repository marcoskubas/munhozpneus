var Sistema = {
    init : function(){
       $('.tinytable tbody tr').click(function(){
           var check = $(this).find('input[type=checkbox]').attr('checked');
           if(check === undefined){
               $(this).find('input[type=checkbox]').attr('checked', true);
           }else{
               $(this).find('input[type=checkbox]').attr('checked', false);
           }
       }); 
    }
};
$(Sistema.init);


