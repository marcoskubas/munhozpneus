<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agendamentos extends CI_Controller{
    
    private $alias = 'agendamentos';
    private $title = 'Agendamentos / Orçamento';
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
            redirect(base_url()."home");
        }
        //LOAD MODEL
        $this->load->model($this->alias.'_model',$this->alias);
        //Model's Auxiliares
        $this->load->model('clientes_model','clientes');
        $this->load->model('veiculos_model','veiculos');
        $this->load->model('produtos_model','produtos');
        $this->load->model('servicos_model','servicos');
    }

    public function index(){
        //LOAD HELPER
        $this->load->helper('tinytable');
        
        //Dados página acessada
        $page = array(
            'pagina' => $this->alias,
            'title' => $this->title
        );
        
        //Recebendo os dados das agendas
        $data['records'] = $this->agendamentos->get_all();
        //Configuração Listagem Registros
        $data['fields'] = array(
                            'id' => 'Código',
                            'nome' => 'Cliente',
                            'veiculo' => 'Veículo',
                            'data_agenda' => 'Data',
                            'hora_agenda' => 'Hora'
                         );
        //LOAD CONFIG
        $this->load->config('myconfig');
        $data['modules_views'] = $this->config->item('modules_views');
        $data['modules_print'] = $this->config->item('modules_print');
        $data['pagina'] = $this->alias;
        
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view($this->alias, $data);
        $this->load->view('html_footer');
    }
    
    public function cadastro(){
        //Dados página acessada
        $page = array(
            'pagina' => $this->alias,
            'title' => $this->title,
            'breadcrumb' => 'Cadastro'
        );
        //Dados Form
        $data['clientes']   = $this->clientes->get_all();
        $data['veiculos']   = $this->veiculos->get_all();
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_'.$this->alias, $data);
        $this->load->view('html_footer');
    }
    
    public function editar($id){
        //Dados página acessada
        $page = array(
            'pagina' => $this->alias,
            'title' => $this->title,
            'breadcrumb' => 'Alteração'
        );
	
        //Dados Form
        $data['record']     = $this->agendamentos->get_byid($id);
        $data['itens_produtos'] = $this->agendamentos->get_itensprodutos($id);
        $data['itens_servicos'] = $this->agendamentos->get_itensservicos($id);
        
        $data['clientes']   = $this->clientes->get_all();
        $data['veiculos']   = $this->veiculos->get_all();
        $data['produtos']   = $this->produtos->get_all();
        $data['servicos']   = $this->servicos->get_all();
        
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_'.$this->alias, $data);
        $this->load->view('html_footer');
    }
    
    public function salvar_alteracao(){
        $id = $this->input->post('id');
	$this->load->library('form_validation');
        $this->form_validation->set_rules('idcliente', 'Cliente', 'required');
        if($this->form_validation->run() == FALSE){	
            if(empty($id)){ $this->cadastro(); }else{ $this->editar($id); }
        }else{
            foreach ($_POST as $key => $value) {
                if($key != 'id' && $key != 'data_agenda'){
                    $data[$key] = utf8_encode($this->input->post($key));
                }elseif($key == 'data_agenda'){
                    $data[$key] = tinydateFormat($this->input->post($key));
                }
            }
            
            if(empty($id)){
                $this->agendamentos->do_insert($data);
            }else{
                $this->agendamentos->do_update($data, array('id' => $id));
            }
        }
    }
    
    public function excluir($id){
        if($id > 0){
            $this->agendamentos->do_delete(array('id' => $id));
        }
    }
    
    public function preview($id){
        //Configuração Preview Registros
        $data['fields'] = array(
                            'id' => 'Código',
                            'descricao' => 'Descrição',
                            'valor' => 'Valor Unitário',
                            'comentarios' => 'Observações'
                         );
        $data['title'] = $this->title;
	$data['record'] = $this->agendamentos->get_byid($id);
        $this->load->view('ajax/previews', $data);
    }
}