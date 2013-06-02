<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelos extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados página acessada
        $page = array(
            'pagina' => 'modelos',
            'title' => 'Modelos'
        );
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('m.id, m.descricao, ma.descricao marca');
        $this->db->from('modelos m');
        $this->db->join('marcas ma','m.idmarca = ma.id','inner');
        $this->db->order_by('m.descricao','ASC');
        //Recebendo os dados das modelos
        $data['records'] = $this->db->get()->result();
        //Configuração Listagem Registros
        $data['fields'] = array(
                            'id' => 'Código',
                            'descricao' => 'Descrição',
                            'marca' => 'Marca'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('modelos', $data);
        $this->load->view('html_footer');
    }
    
    public function cadastro(){
        //Dados página acessada
        $page = array(
            'pagina' => 'modelo',
            'title' => 'Modelos',
            'breadcrumb' => 'Cadastro'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_modelo');
        $this->load->view('html_footer');
    }
    
    public function editar($id){
        //Dados página acessada
        $page = array(
            'pagina' => 'modelos',
            'title' => 'Modelos',
            'breadcrumb' => 'Alteração'
        );
        $this->db->where('id',$id);
	$data['record'] = $this->db->get('modelos')->result();
        
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_modelo', $data);
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
                $this->db->insert('modelos',$data);
            }else{
                $this->db->where('id',$id);
                $this->db->update('modelos',$data);   
            }
            redirect(base_url()."modelos");
        }
    }
    
    public function excluir($id){
        $this->db->where('id',$id);
        $this->db->delete('modelos');
        redirect(base_url()."modelos");
    }
}