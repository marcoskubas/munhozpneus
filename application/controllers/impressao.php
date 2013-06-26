<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Impressao extends CI_Controller{
    
    public function index(){
        
    }
    
    public function ajax_estados($estado){
        $this->load->model('cidades_model', 'cidades');
        $data['cidades'] = $this->cidades->get_byestado($estado);
        $data['tipo'] = 'cidade';
        $this->load->view('ajax/options', $data);
    }
    
    public function ajax_marcas($marca){
        $this->load->model('modelos_model', 'modelos');
        $data['modelos'] = $this->modelos->get_bymarca($marca);
        $data['tipo'] = 'modelo';
        $this->load->view('ajax/options', $data);
    }
    
    public function agendamentos ($id){
        //LOAD MODEL
        $this->load->model('agendamentos_model', 'agendamentos');
        $this->load->model('clientes_model', 'clientes');
        $this->load->model('veiculos_model', 'veiculos');
        
        //Dados página acessada
        $page = array(
            'pagina' => 'agendamentos',
            'title' => 'Agendamento / Orçamento'
        );
        
        //Dados Consulta
        $data['record']         = $this->agendamentos->get_byid($id);
        $data['itens_produtos'] = $this->agendamentos->get_itensprodutos($id);
        $data['itens_servicos'] = $this->agendamentos->get_itensservicos($id);
        $data['cliente']        = $this->clientes->get_byid($data['record']->idcliente);
        $data['veiculo']        = $this->veiculos->get_byid($data['record']->idveiculo);
        
        //Consulta dados Relatório
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('print/agendamentos', $data);
        $this->load->view('html_footer');
    }
}