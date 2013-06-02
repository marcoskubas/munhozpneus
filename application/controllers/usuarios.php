<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'usuarios',
            'title' => 'Usu�rios'
        );
        //Criando querys SQL
        $data['records'] = $this->db->get('usuarios')->result();
        //Configura��o Listagem Registros
        $data['fields'] = array(
                            'id' => 'C�digo',
                            'name' => 'Nome',
                            'email' => 'E-mail',
                            'enterdate' => 'Data de Registro',
                            'block' => 'Usu�rio Ativo'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('usuarios', $data);
        $this->load->view('html_footer');
    }
    
    public function cadastro(){
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'usuario',
            'title' => 'Usu�rios',
            'breadcrumb' => 'Cadastro'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_usuario');
        $this->load->view('html_footer');
    }
    
    public function editar($id){
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'usuarios',
            'title' => 'Usu�rios',
            'breadcrumb' => 'Altera��o'
        );
        $this->db->where('id',$id);
	$data['record'] = $this->db->get('usuarios')->result();
        
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_usuario', $data);
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
                $this->db->insert('usuarios',$data);
            }else{
                $this->db->where('id',$id);
                $this->db->update('usuarios',$data);   
            }
            redirect(base_url()."usuarios");
        }
    }
    
    public function excluir($id){
        $this->db->where('id',$id);
        $this->db->delete('usuarios');
        redirect(base_url()."usuarios");
    }
}