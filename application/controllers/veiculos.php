<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Veiculos extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados página acessada
        $page = array(
            'pagina' => 'veiculos',
            'title' => 'Veículos'
        );
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('v.id, c.nome, ma.descricao marca, m.descricao modelo, v.placa');
        $this->db->from('veiculos v');
        $this->db->join('clientes c','v.idcliente = c.id','inner');
        $this->db->join('modelos m','v.idmodelo = m.id','inner');
        $this->db->join('marcas ma','m.idmarca = ma.id','inner');
        $this->db->order_by('c.nome','ASC');		
        //Recebendo os dados das veiculos
        $data['records'] = $this->db->get()->result();
        //Configuração Listagem Registros
        $data['fields'] = array(
                            'id' => 'Código',
                            'nome' => 'Cliente',
                            'marca' => 'Marca',
                            'modelo' => 'Modelo',
                            'placa' => 'Placa'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('veiculos', $data);
        $this->load->view('html_footer');
    }
    
    public function cadastro(){
        //Dados página acessada
        $page = array(
            'pagina' => 'veiculos',
            'title' => 'Veículos',
            'breadcrumb' => 'Cadastro'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_veiculo');
        $this->load->view('html_footer');
    }
    
    public function editar($id){
        //Dados página acessada
        $page = array(
            'pagina' => 'veiculos',
            'title' => 'Veículos',
            'breadcrumb' => 'Alteração'
        );
        $this->db->where('id',$id);
	$data['record'] = $this->db->get('veiculos')->result();
        
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_veiculo', $data);
        $this->load->view('html_footer');
    }
    
    public function salvar_alteracao(){
        $id = $this->input->post('id');
	$this->load->library('form_validation');
        $this->form_validation->set_rules('placa', 'Placa', 'required');
        if($this->form_validation->run() == FALSE){	
            $this->editar($id);
        }else{
            foreach ($_POST as $key) {
                if($key != 'id'){
                    $data[$key] = $this->input->post($key);    
                }
            }
            if(empty($id)){
                $this->db->insert('veiculos',$data);
            }else{
                $this->db->where('id',$id);
                $this->db->update('veiculos',$data);   
            }
            redirect(base_url()."veiculos");
        }
    }
    
    public function excluir($id){
        $this->db->where('id',$id);
        $this->db->delete('veiculos');
        redirect(base_url()."veiculos");
    }
}