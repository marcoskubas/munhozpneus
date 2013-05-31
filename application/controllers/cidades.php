<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cidades extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'cidades',
            'title' => 'Cidades'
        );
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('c.id, c.descricao, e.descricao estado');
        $this->db->from('cidades c');
        $this->db->join('estados e','c.idestado = e.id','inner');
        $this->db->order_by('c.descricao','ASC');		
        //Recebendo os dados das cidades
        $data['records'] = $this->db->get()->result();
        //Configura��o Listagem Registros
        $data['fields'] = array(
                            'id' => 'C�digo',
                            'descricao' => 'Descri��o',
                            'estado' => 'Estado'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('cidades', $data);
        $this->load->view('html_footer');
    }
}