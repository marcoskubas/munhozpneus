<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Veiculos extends CI_Controller{
    
    private $alias = 'veiculos';
    private $title = 'Ve�culos';
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
            redirect(base_url()."home");
        }
        //LOAD MODEL
        $this->load->model($this->alias.'_model',$this->alias);
        //Model's Auxiliares
        $this->load->model('clientes_model','clientes');
        $this->load->model('marcas_model','marcas');
        $this->load->model('modelos_model','modelos');
        $this->load->model('combustiveis_model','combustiveis');
        
        //Library
        $this->load->library('form_validation');
        $this->load->library('my_form_validation');
    }

    public function index(){
        $this->load->helper('tinytable');
        //Dados p�gina acessada
        $page = array(
            'pagina' => $this->alias,
            'title' => $this->title
        );
        
        $data['records'] = $this->veiculos->get_all();
        //Configura��o Listagem Registros
        $data['fields'] = array(
                            'id' => 'C�digo',
                            'nome' => 'Cliente',
                            'marca' => 'Marca',
                            'modelo' => 'Modelo',
                            'placa' => 'Placa'
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
        //Dados Form
        $data['combustiveis']   = $this->combustiveis->get_all();
        $data['clientes']       = $this->clientes->get_all();
        $data['marcas']         = $this->marcas->get_all();
        $data['modelos']        = $this->modelos->get_all();
        
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
        //Dados Form
	$data['record']         = $this->veiculos->get_byid($id);
        $data['combustiveis']   = $this->combustiveis->get_all();
        $data['clientes']       = $this->clientes->get_all();
        $data['marcas']         = $this->marcas->get_all();
        $data['modelos']        = $this->modelos->get_all();
        
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
        $this->form_validation->set_rules('idmarca', 'Marca', 'required');
        $this->form_validation->set_rules('idmodelo', 'Modelo', 'required');
        $this->form_validation->set_rules('idcombustivel', 'Combust�vel', 'required');
        if($this->form_validation->run() == FALSE){	
            if(empty($id)){ $this->cadastro(); }else{ $this->editar($id); }
        }else{
            foreach ($_POST as $key => $value) {
                if($key != 'id' && $key != 'idmarca'){
                    $data[$key] = utf8_encode($this->input->post($key));
                }
            }
            printr($data);
            if(empty($id)){
                $this->veiculos->do_insert($data);
            }else{
                $this->veiculos->do_update($data, array('id' => $id));
            }
        }
    }
    
    public function excluir($id){
        if($id > 0){
            $this->veiculos->do_delete(array('id' => $id));
        }
    }
    
    public function preview($id){
        //Configura��o Preview Registros
        $data['fields'] = array(
            'id' => 'C�digo',
            'cliente' => 'Cliente',
            'modelo' => 'Modelo',
            'combustivel' => 'Combust�vel',
            'cor' => 'Cor',
            'placa' => 'Placa',
            'ano' => 'Ano',
            'motor' => 'Motor',
            'comentarios' => 'Observa��es'
        );
        $data['title'] = $this->title;
	$data['record'] = $this->veiculos->get_byid($id);
        $this->load->view('ajax/previews', $data);
    }
}