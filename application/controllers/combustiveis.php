<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Combustiveis extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'combustiveis',
            'title' => 'Combustiveis'
        );
        //Criando querys SQL
        $data['records'] = $this->db->get('combustiveis')->result();
        //Configura��o Listagem Registros
        $data['fields'] = array(
                            'id' => 'C�digo',
                            'descricao' => 'Descri��o',
                            'comentarios' => 'Observa��es'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('combustiveis', $data);
        $this->load->view('html_footer');
    }
    
    public function cadastro(){
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'combustiveis',
            'title' => 'Combust�veis',
            'breadcrumb' => 'Cadastro'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_combustivel');
        $this->load->view('html_footer');
    }
    
    public function editar($id){
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'combustiveiss',
            'title' => 'Combust�veis',
            'breadcrumb' => 'Altera��o'
        );
        $this->db->where('id',$id);
	$data['record'] = $this->db->get('combustiveiss')->result();
        
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_combustivel', $data);
        $this->load->view('html_footer');
    }
    
    public function salvar_alteracao(){
        $id = $this->input->post('id');
	$this->load->library('form_validation');
        $this->form_validation->set_rules('descricao', 'Descri��o', 'required');
        if($this->form_validation->run() == FALSE){	
            $this->editar($id);
        }else{
            foreach ($_POST as $key) {
                if($key != 'id'){
                    $data[$key] = $this->input->post($key);    
                }
            }
            if(empty($id)){
                $this->db->insert('combustiveiss',$data);
            }else{
                $this->db->where('id',$id);
                $this->db->update('combustiveiss',$data);   
            }
            redirect(base_url()."combustiveiss");
        }
    }
    
    public function excluir($id){
        $this->db->where('id',$id);
        $this->db->delete('combustiveiss');
        redirect(base_url()."combustiveiss");
    }
}