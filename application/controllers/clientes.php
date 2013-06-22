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
        //Dados página acessada
        $page = array(
            'pagina' => $this->alias,
            'title' => $this->title
        );
        
        $data['records'] = $this->clientes->get_all();
        //Configuração Listagem Registros
        $data['fields'] = array(
                            'id' => 'Código',
                            'nome' => 'Nome',
                            'endereco' => 'Endereço',
                            'telefone' => 'Telefone',
                            'celular' => 'Celular',
                            'email' => 'E-mail'
                         );
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
        $data['estados'] = $this->estados->get_all();
        $data['cidades'] = $this->cidades->get_all();
        
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
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
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
}