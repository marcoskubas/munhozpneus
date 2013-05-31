<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'clientes',
            'title' => 'Clientes'
        );
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('id, nome, endereco, celular, telefone, email');
        $this->db->from('clientes');
        $data['records'] = $this->db->get()->result();
        //Configura��o Listagem Registros
        $data['fields'] = array(
                            'id' => 'C�digo',
                            'nome' => 'Nome',
                            'endereco' => 'Endere�o',
                            'telefone' => 'Telefone',
                            'celular' => 'Celular',
                            'email' => 'E-mail'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('clientes', $data);
        $this->load->view('html_footer');
    }
}