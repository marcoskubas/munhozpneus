<?php
function NumberFormat($valor, $decimal = 2, $view = 0) {
    if ( $view == 0 ) {
        $number = number_format($valor, $decimal, ',', '.');
    }
    elseif ( $view == 1 ) {
        $check = explode(",", $valor);

        if ( count($check) > 1 ) {
            $number = str_replace(".", "", $valor);
            $number = str_replace(",", ".", $number);
        }
        else {
            $number = $valor;
        }
    }
    elseif ( $view == 2 ) {
        $number = str_replace(".", "", $valor);
    }
    elseif ( $view == 3 ) {
        $ext = explode(",", $valor);
        if ( count($ext) > 1 ) {
            if ( $ext[0] > 0 ) {
                $number = $ext[0] . "," . rtrim($ext[1], "0");
                if ( strlen($number) == 2 ) {
                    $number = substr($number, 0, -1);
                }
            }
            else {
                $number = $valor;
            }
        }
        else {
            $number = $valor;
        }
    }

    return $number;
}
    
function number_complete($number){
    $result = 1000+$number;
    $divisao = $number / 1000;
    if($divisao > 1){
        $result += 1000;
    }
    return $result;
}
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
