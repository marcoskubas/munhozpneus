<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cidades extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados página acessada
        $page = array(
            'pagina' => 'cidades',
            'title' => 'Cidades'
        );
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('c.id, c.descricao, e.descricao estado');
        $this->db->from('cidades c');
        $this->db->join('estados e','c.idestado = e.id','inner');
        $this->db->order_by('c.descricao','ASC');		
        //Recebendo os dados das cidades
        $data['records'] = $this->db->get()->result();
        //Configuração Listagem Registros
        $data['fields'] = array(
                            'id' => 'Código',
                            'descricao' => 'Descrição',
                            'estado' => 'Estado'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('cidades', $data);
        $this->load->view('html_footer');
    }
    
    public function cadastro(){
        //Dados página acessada
        $page = array(
            'pagina' => 'cidade',
            'title' => 'Cidades',
            'breadcrumb' => 'Cadastro'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_cidade');
        $this->load->view('html_footer');
    }
    
    public function editar($id){
        //Dados página acessada
        $page = array(
            'pagina' => 'cidades',
            'title' => 'Cidades',
            'breadcrumb' => 'Alteração'
        );
        $this->db->where('id',$id);
	$data['record'] = $this->db->get('cidades')->result();
        
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_cidade', $data);
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
                $this->db->insert('cidades',$data);
            }else{
                $this->db->where('id',$id);
                $this->db->update('cidades',$data);   
            }
            redirect(base_url()."cidades");
        }
    }
    
    public function excluir($id){
        $this->db->where('id',$id);
        $this->db->delete('cidades');
        redirect(base_url()."cidades");
    }
}