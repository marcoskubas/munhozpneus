<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller{
    
    private $alias = 'clientes';
    private $title = 'Clientes';
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
            redirect(base_url()."home");
        }
        
        //LOAD MODEL
        $this->load->model($this->alias.'_model',$this->alias);
        //Model's Auxiliares
        $this->load->model('estados_model','estados');
        $this->load->model('cidades_model','cidades');
    }

    public function index(){
        $this->load->helper('tinytable');
        //Dados p�gina acessada
        $page = array(
            'pagina' => $this->alias,
            'title' => $this->title
        );
        
        $data['records'] = $this->clientes->get_all();
        //Configura��o Listagem Registros
        $data['fields'] = array(
                            'id' => 'C�digo',
                            'nome' => 'Nome',
                            'endereco' => 'Endere�o',
                            'telefone' => 'Telefone',
                            'celular' => 'Celular',
                            'email' => 'E-mail'
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
        //Dados p�gina acessada
        $page = array(
            'pagina' => $this->alias,
            'title' => $this->title,
            'breadcrumb' => 'Cadastro'
        );
        $data['estados'] = $this->estados->get_all();
        $data['cidades'] = $this->cidades->get_all();
        
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_'.$this->alias, $data);
        $this->load->view('html_footer');
    }
    
    public function editar($id){
        //Dados p�gina acessada
        $page = array(
            'pagina' => $this->alias,
            'title' => $this->title,
            'breadcrumb' => 'Altera��o'
        );
	
        $data['record'] = $this->clientes->get_byid($id);
        $data['estados'] = $this->estados->get_all();
        $data['cidades'] = $this->cidades->get_all();
        
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_'.$this->alias, $data);
        $this->load->view('html_footer');
    }
    
    public function salvar_alteracao(){
        $id = $this->input->post('id');
	$this->load->library('form_validation');
        $this->form_validation->set_rules('descricao', 'Descri��o', 'required');
        if($this->form_validation->run() == FALSE){	
            if(empty($id)){ $this->cadastro(); }else{ $this->editar($id); }
        }else{
            foreach ($_POST as $key => $value) {
                if($key != 'id' && $key != 'idestado'){
                    $data[$key] = utf8_encode($this->input->post($key));
                }
            }
            if(empty($id)){
                $this->clientes->do_insert($data);
            }else{
                $this->clientes->do_update($data, array('id' => $id));
            }
        }
    }
    
    public function excluir($id){
        if($id > 0){
            $this->clientes->do_delete(array('id' => $id));
        }
    }
    
    public function preview($id){
        //Configura��o Preview Registros
        $data['fields'] = array(
            'id' => 'C�digo',
            'nome' => 'Nome',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'email' => 'E-Mail',
            'cpf' => 'CPF',
            'endereco' => 'Endere�o',
            'numero' => 'N�mero',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade'
        );
        $data['title'] = $this->title;
	$data['record'] = $this->clientes->get_byid($id);
        $this->load->view('ajax/previews', $data);
    }
}