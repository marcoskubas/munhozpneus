<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados página acessada
        $page = array(
            'pagina' => 'produtos',
            'title' => 'Produtos'
        );
        //Criando querys SQL
        $data['records'] = $this->db->get('produtos')->result();
        //Configuração Listagem Registros
        $data['fields'] = array(
                            'id' => 'Código',
                            'descricao' => 'Descrição',
                            'comentarios' => 'Observações'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('produtos', $data);
        $this->load->view('html_footer');
    }
}