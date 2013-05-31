<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agendamentos extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados página acessada
        $page = array(
            'pagina' => 'agendamentos',
            'title' => 'Agendamento / Orçamento'
        );
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('a.id, c.nome');
        $this->db->from('agendas a');
        $this->db->join('clientes c','a.idcliente = c.id','inner');
        $this->db->order_by('c.nome','ASC');		
        //Recebendo os dados das agendas
        $data['records'] = $this->db->get()->result();
        //Configuração Listagem Registros
        $data['fields'] = array(
                            'id' => 'Código',
                            'nome' => 'Cliente'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('agendamentos', $data);
        $this->load->view('html_footer');
    }
    
    public function cadastro(){
        //Dados página acessada
        $page = array(
            'pagina' => 'agendamentos',
            'title' => 'Agendamentos / Orçamentos'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_agendamento');
        $this->load->view('html_footer');
    }
}