<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'clientes',
            'title' => 'Clientes'
        );
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('id, nome, endereco, celular, telefone, email');
        $this->db->from('clientes');
        $data['records'] = $this->db->get()->result();
        //Configura��o Listagem Registros
        $data['fields'] = array(
                            'id' => 'C�digo',
                            'nome' => 'Nome',
                            'endereco' => 'Endere�o',
                            'telefone' => 'Telefone',
                            'celular' => 'Celular',
                            'email' => 'E-mail'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('clientes', $data);
        $this->load->view('html_footer');
    }
    
    public function cadastro(){
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'cliente',
            'title' => 'Cidades',
            'breadcrumb' => 'Cadastro'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_cliente');
        $this->load->view('html_footer');
    }
    
    public function editar($id){
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'clientes',
            'title' => 'Cidades',
            'breadcrumb' => 'Altera��o'
        );
        $this->db->where('id',$id);
	$data['record'] = $this->db->get('clientes')->result();
        
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_cliente', $data);
        $this->load->view('html_footer');
    }
    
    public function salvar_alteracao(){
        $id = $this->input->post('id');
	$this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        if($this->form_validation->run() == FALSE){	
            $this->editar($id);
        }else{
            foreach ($_POST as $key) {
                if($key != 'id'){
                    $data[$key] = $this->input->post($key);    
                }
            }
            if(empty($id)){
                $this->db->insert('clientes',$data);
            }else{
                $this->db->where('id',$id);
                $this->db->update('clientes',$data);   
            }
            redirect(base_url()."clientes");
        }
    }
    
    public function excluir($id){
        $this->db->where('id',$id);
        $this->db->delete('clientes');
        redirect(base_url()."clientes");
    }
}