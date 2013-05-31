<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Combustiveis extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'combustiveis',
            'title' => 'Combustiveis'
        );
        //Criando querys SQL
        $data['records'] = $this->db->get('combustiveis')->result();
        //Configura��o Listagem Registros
        $data['fields'] = array(
                            'id' => 'C�digo',
                            'descricao' => 'Descri��o',
                            'comentarios' => 'Observa��es'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('combustiveis', $data);
        $this->load->view('html_footer');
    }
}