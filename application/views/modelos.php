<!-- Content -->
<div id="content" class="container-fluid">
    <h2>Modelos</h2>
    <div class="actions fRight">
        <button type="button" class="btn"><i class="icon-plus"></i> Novo</button>
        <button type="button" class="btn"><i class="icon-pencil"></i> Editar</button>
        <button type="button" class="btn"><i class="icon-trash"></i> Excluir</button>
        <button type="button" class="btn"><i class="icon-search"></i> Visualizar</button>
        <button type="button" class="btn"><i class="icon-print"></i> Imprimir</button>
    </div>
    <?php 
    tinytable($records, $fields);
    ?>
</div>
<script type="text/javascript">
    var sorter = new TINY.table.sorter('sorter','table',{
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
        init: true
    });
</script>
<!-- /Content -->