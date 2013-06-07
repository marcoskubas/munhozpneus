<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agendamentos extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->load->helper('tinytable');
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'agendamentos',
            'title' => 'Agendamento / Or�amento'
        );
        
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('a.id, c.nome, CONCAT(m.descricao," ",placa) AS veiculo, a.data_agenda, a.hora_agenda', FALSE);
        $this->db->from('agendas a');
        $this->db->join('clientes c','a.idcliente = c.id','inner');
        $this->db->join('veiculos v','a.idveiculo = v.id','inner');
        $this->db->join('modelos m','v.idmodelo = m.id','inner');
        $this->db->order_by('c.nome','ASC');		
        //Recebendo os dados das agendas
        $data['records'] = $this->db->get()->result();
        //Configura��o Listagem Registros
        $data['fields'] = array(
                            'id' => 'C�digo',
                            'nome' => 'Cliente',
                            'veiculo' => 'Ve�culo',
                            'data_agenda' => 'Data',
                            'hora_agenda' => 'Hora'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('agendamentos', $data);
        $this->load->view('html_footer');
    }
    
    public function cadastro(){
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'agendamentos',
            'title' => 'Agendamentos / Or�amentos',
            'breadcrumb' => 'Cadastro'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_agendamento');
        $this->load->view('html_footer');
    }
    
    public function editar($id){
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'agendamentos',
            'title' => 'Agendamentos / Or�amentos',
            'breadcrumb' => 'Altera��o'
        );
        $this->db->where('id',$id);
	$data['record'] = $this->db->get('agendas')->result();
        
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_agendamento', $data);
        $this->load->view('html_footer');
    }
    
    public function salvar_alteracao(){
        $id = $this->input->post('id');
	$this->load->library('form_validation');
        $this->form_validation->set_rules('cliente', 'Cliente', 'required');
        if($this->form_validation->run() == FALSE){	
            $this->editar($id);
        }else{
            foreach ($_POST as $key) {
                if($key != 'id'){
                    $data[$key] = $this->input->post($key);    
                }
            }
            if(empty($id)){
                $this->db->insert('agendas',$data);
            }else{
                $this->db->where('id',$id);
                $this->db->update('agendas',$data);   
            }
            redirect(base_url()."agendamentos");
        }
    }
    
    public function excluir($id){
        $this->db->where('id',$id);
        $this->db->delete('agendas');
        redirect(base_url()."agendamentos");
    }
}