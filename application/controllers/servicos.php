<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicos extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        //LOAD MODEL
        $this->load->model('servicos_model','servicos');
    }

    public function index(){
        $this->load->helper('tinytable');
        //Dados página acessada
        $page = array(
            'pagina' => 'servicos',
            'title' => 'Serviços'
        );
        //Criando querys SQL
        $data['records'] = $this->servicos->listar_servicos();
        //Configuração Listagem Registros
        $data['fields'] = array(
                            'id' => 'Código',
                            'descricao' => 'Descrição',
                            'comentarios' => 'Observações'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('servicos', $data);
        $this->load->view('html_footer');
    }
    
    public function cadastro(){
        //Dados página acessada
        $page = array(
            'pagina' => 'servico',
            'title' => 'Serviços',
            'breadcrumb' => 'Cadastro'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_servico');
        $this->load->view('html_footer');
    }
    
    public function editar($id){
        //Dados página acessada
        $page = array(
            'pagina' => 'servicos',
            'title' => 'Serviços',
            'breadcrumb' => 'Alteração'
        );
        $this->db->where('id',$id);
	$data['record'] = $this->db->get('servicos')->result();
        
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_servico', $data);
        $this->load->view('html_footer');
    }
    
    public function salvar_alteracao(){
        $id = $this->input->post('id');
	$this->load->library('form_validation');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        if($this->form_validation->run() == FALSE){	
            $this->editar($id);
        }else{
            foreach ($_POST as $key) {
                if($key != 'id'){
                    $data[$key] = $this->input->post($key);    
                }
            }
            if(empty($id)){
                $this->db->insert('servicos',$data);
            }else{
                $this->db->where('id',$id);
                $this->db->update('servicos',$data);   
            }
            redirect(base_url()."servicos");
        }
    }
    
    public function excluir($id){
        $this->db->where('id',$id);
        $this->db->delete('servicos');
        redirect(base_url()."servicos");
    }
}