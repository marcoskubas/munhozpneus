<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Impressao extends CI_Controller{
    
    public function index(){
        
    }
    
    public function agendamentos ($id){
        //LOAD MODEL
        $this->load->model('agendamentos_model', 'agendamentos');
        
        //Dados página acessada
        $page = array(
            'pagina' => 'agendamentos',
            'title' => 'Agendamento / Orçamento'
        );
        
        //Dados Consulta
        $data['record']     = $this->agendamentos->get_byid($id);
        $data['itens_produtos'] = $this->agendamentos->get_itensprodutos($id);
        $data['itens_servicos'] = $this->agendamentos->get_itensservicos($id);
        
        //Consulta dados Relatório
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('print/agendamentos');
        $this->load->view('html_footer');
    }
}