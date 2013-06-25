<button type="button" class="btn btn-new"><i class="icon-plus"></i> Novo</button>
<button type="button" class="btn btn-edit"><i class="icon-pencil"></i> Editar</button>
<button type="button" class="btn btn-delete"><i class="icon-trash"></i> Excluir</button>
<?php
if(isset($modules_views)){
    if(array_search($pagina, $modules_views)){
        echo '<button type="button" class="btn btn-view"><i class="icon-search"></i> Visualizar</button>';
    }
    if(array_search($pagina, $modules_print)){
        echo '<button type="button" class="btn btn-print"><i class="icon-print"></i> Imprimir</button>';
    }
}
?>