<?php
/**
 * Verifica link classe ativa
 * @param String $pagina Página atual
 * @param String $link Link a ser testado
 * @return String class='active'
 */
function checkActiveLink($pagina, $link){
    $active = ($pagina == $link) ? " class='active'" : "";
    return $active;
}
/**
 * Verifica se foi executada alguma ação ao 
 * redirecionar para as listagens de registros
 * @param $session Session -> Ex.: $this->session->userdata('acao');
 * @return array('acaoMessage','classMessage')
 */
function checkActionMessage($session){
    $sessionMessage = $session;
    $acaoMessage = "";
    $classMessage = "";
    if(!empty($sessionMessage)):
        $acaoMessage = $session;
        $classMessage = " sucesso";
    else:
        $classMessage = " hidden";
    endif;
    
    return array('acaoMessage' => $acaoMessage, 'classMessage' => $classMessage);
}
/**
 * Verifica valor padrão
 * @param $define String, Int. Valor definido
 * @param $valor String, Int. Valor padrão
 * @param $type String ('select','checkbox')
 * @return String 'selected','checked'
 */
function setValueDefault($define, $valor, $type) {
    switch ($type) :
        case 'select':
            $set = "selected='selected'";
            break;
        case 'checkbox':
            $set = "checked='checked'";
            break;
        case 'radio':
            $set = "checked='checked'";
            break;
        default:
            $set = "";
            break;
    endswitch;
    $default = ($define == $valor) ? $set : "";
    return $default;
}

/**
* Imprime valores dependendo do formato, caso não encontre o tipo da variavel dá um var_dump.
* @param mixed $val Pode ser um Objeto, Array, texto ou qualquer outro tipo de variavel.
*/
function printr($val) {
   if ( is_object($val) || is_array($val) ) {
       echo '<pre>';
       print_r($val);
       echo '</pre><br />';
   }else if ( empty($val) || is_resource($val) ) {
       echo '<pre>';
       var_dump($val);
       echo '</pre><br />';
   }else{
       echo $val . '<br />';
   }
}
