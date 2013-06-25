<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller{
    
    private $alias = 'usuarios';
    private $title = 'Usuários';
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
            redirect(base_url()."home");
        }
        //LOAD MODEL
        $this->load->model($this->alias.'_model',$this->alias);
    }

    public function index(){
        $this->load->helper('tinytable');
        //Dados página acessada
        $page = array(
            'pagina' => $this->alias,
            'title' => $this->title
        );
        
        $data['records'] = $this->usuarios->get_all();
        //Configuração Listagem Registros
        $data['fields'] = array(
                            'id' => 'Código',
                            'name' => 'Nome',
                            'email' => 'E-mail',
                            'phone' => 'Telefone',
                            'block' => 'Usuário Bloqueado'
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

        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_'.$this->alias);
        $this->load->view('html_footer');
    }
    
    public function editar($id){
        //Dados página acessada
        $page = array(
            'pagina' => $this->alias,
            'title' => $this->title,
            'breadcrumb' => 'Alteração'
        );
	$data['record'] = $this->usuarios->get_byid($id);
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_'.$this->alias, $data);
        $this->load->view('html_footer');
    }
    
    public function salvar_alteracao(){
        $id = $this->input->post('id');
	$this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nome', 'required');
        if($this->form_validation->run() == FALSE){	
            if(empty($id)){ $this->cadastro(); }else{ $this->editar($id); }
        }else{
            foreach ($_POST as $key => $value) {
                $valor = $this->input->post($key);
                if($key != 'id' && $key != 'conpassword' && $key != 'pasw'){
                    $data[$key] = utf8_encode($this->input->post($key));
                }elseif($key == 'pasw' && !empty($valor) ){
                    $data[$key] = md5( utf8_encode($this->input->post($key)) );
                }
            }
            if(empty($id)){
                //$data['enterdate'] = date('Y-m-d H:i:s');
                $this->usuarios->do_insert($data);
            }else{
                $this->usuarios->do_update($data, array('id' => $id));
            }
        }
    }
    
    public function excluir($id){
        if($id > 0){
            $this->usuarios->do_delete(array('id' => $id));
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
	$data['record'] = $this->usuarios->get_byid($id);
        $this->load->view('ajax/previews', $data);
    }
}