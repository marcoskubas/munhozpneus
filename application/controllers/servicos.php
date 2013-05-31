<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicos extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'servicos',
            'title' => 'Servi�os'
        );
        //Criando querys SQL
        $data['records'] = $this->db->get('servicos')->result();
        //Configura��o Listagem Registros
        $data['fields'] = array(
                            'id' => 'C�digo',
                            'descricao' => 'Descri��o',
                            'comentarios' => 'Observa��es'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('servicos', $data);
        $this->load->view('html_footer');
    }
}