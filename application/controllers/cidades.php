<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cidades extends CI_Controller{
    
    private $alias = 'cidades';
    private $title = 'Cidades';
    
    public function __construct() {
        parent::__construct();
        //LOAD MODEL
        $this->load->model($this->alias.'_model',$this->alias);
    }

    public function index(){
        $this->load->helper('tinytable');
        //Dados p�gina acessada
        $page = array(
            'pagina' => $this->alias,
            'title' => $this->title
        );
        
        $data['records'] = $this->cidades->get_all();
        //Configura��o Listagem Registros
        $data['fields'] = array(
                            'id' => 'C�digo',
                            'descricao' => 'Descri��o',
                            'estado' => 'Estado'
                         );
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
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_'.$this->alias);
        $this->load->view('html_footer');
    }
    
    public function editar($id){
        //Dados p�gina acessada
        $page = array(
            'pagina' => $this->alias,
            'title' => $this->title,
            'breadcrumb' => 'Altera��o'
        );
	$data['record'] = $this->cidades->get_byid($id);
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
                if($key != 'id'){
                    $data[$key] = utf8_encode($this->input->post($key));
                }
            }
            if(empty($id)){
                $this->cidades->do_insert($data);
            }else{
                $this->cidades->do_update($data, array('id' => $id));
            }
        }
    }
    
    public function excluir($id){
        if($id > 0){
            $this->cidades->do_delete(array('id' => $id));
        }
    }
}