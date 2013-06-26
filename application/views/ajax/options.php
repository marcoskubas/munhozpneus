<?
if($tipo == 'cidade'){
    if(count($cidades) > 0){
        foreach ($cidades as $cidade) {
            echo "<option value='".$cidade->id."'>".$cidade->descricao."</option>";
         }   
    }else{
        echo "<option value=''>Nenhuma cidade</option>";
    }
}elseif($tipo == 'modelo'){
    if(count($modelos) > 0){
        foreach ($modelos as $modelo) {
            echo "<option value='".$modelo->id."'>".$modelo->descricao."</option>";
         }   
    }else{
        echo "<option value=''>Nenhum modelo</option>";
    }
}
?>