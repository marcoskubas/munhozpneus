<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agendamentos_model extends CI_Model{
    
    private $table = 'agendas';
    private $view = 'agendamentos';
    
    function __construct(){
        parent::__construct();
    }
    
    public function do_insert($dados=NULL){
        if($dados != NULL){
            $this->db->insert($this->table, $dados);
            $this->session->set_userdata('acaoOk','Cadastro efetuado com sucesso!');
            redirect(base_url().$this->view);
        }
    }
    
    public function do_update($dados=NULL,$condicao=NULL){
        if($dados != NULL && $condicao != NULL){
            $this->db->update($this->table, $dados, $condicao);
            $this->session->set_userdata('acaoOk','Cadastro alterado com sucesso!');
            redirect(base_url().$this->view);
        }
    }
    
    public function do_delete($condicao=NULL){
        if($condicao != NULL){
            $this->db->delete($this->table, $condicao);
            $this->session->set_userdata('acaoOk','Registro deletado com sucesso!');
            redirect(base_url().$this->view);
        }
    }
    
    public function get_all(){
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('a.id, c.nome, CONCAT(m.descricao," ",placa) AS veiculo, a.data_agenda, a.hora_agenda', FALSE);
        $this->db->from('agendas a');
        $this->db->join('clientes c','a.idcliente = c.id','inner');
        $this->db->join('veiculos v','a.idveiculo = v.id','inner');
        $this->db->join('modelos m','v.idmodelo = m.id','inner');
        $this->db->order_by('c.nome','ASC');		
        return $this->db->get()->result();
    }
    
    public function get_byid($id=NULL){   
        if($id != NULL){
            $this->db->where('id',$id);
            return $this->db->get($this->table)->row();
        }else{
            return false;
        }
    }
}