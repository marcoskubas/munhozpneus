<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Impressao extends CI_Controller{
    
    public function index(){
        
    }
    
    public function agendamentos ($id){
        //LOAD MODEL
        $this->load->model('agendamentos_model', 'agendamentos');
        $this->load->model('clientes_model', 'clientes');
        $this->load->model('veiculos_model', 'veiculos');
        
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'agendamentos',
            'title' => 'Agendamento / Or�amento'
        );
        
        //Dados Consulta
        $data['record']         = $this->agendamentos->get_byid($id);
        $data['itens_produtos'] = $this->agendamentos->get_itensprodutos($id);
        $data['itens_servicos'] = $this->agendamentos->get_itensservicos($id);
        $data['cliente']        = $this->clientes->get_byid($data['record']->idcliente);
        $data['veiculo']        = $this->veiculos->get_byid($data['record']->idveiculo);
        
        //Consulta dados Relat�rio
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('print/agendamentos', $data);
        $this->load->view('html_footer');
    }
}