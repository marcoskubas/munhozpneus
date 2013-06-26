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
            $id = $this->db->insert_id();
            redirect(base_url().$this->view."/editar/{$id}");
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
    
    public function get_itensprodutos($id=NULL){
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('i.id, i.quantidade, p.descricao');
        $this->db->from('itens_agenda i');
        $this->db->join('produtos p','i.idproduto = p.id','inner');
        $this->db->where('i.idagenda',$id);
        $this->db->order_by('i.id','ASC');		
        return $this->db->get()->result();
    }
    
    public function get_itensservicos($id=NULL){
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('i.id, i.quantidade, s.descricao');
        $this->db->from('itens_agenda i');
        $this->db->join('servicos s','i.idservico = s.id','inner');
        $this->db->where('i.idagenda',$id);
        $this->db->order_by('i.id','ASC');
        return $this->db->get()->result();
    }
    
    public function get_byid($id=NULL){   
        if($id != NULL){
            $this->db->select('a.id, c.nome AS cliente, CONCAT(m.descricao," ",placa) AS veiculo, a.data_agenda, a.hora_agenda', FALSE);
            $this->db->from('agendas a');
            $this->db->join('clientes c','a.idcliente = c.id','inner');
            $this->db->join('veiculos v','a.idveiculo = v.id','inner');
            $this->db->join('modelos m','v.idmodelo = m.id','inner');
            $this->db->where('a.id',$id);
            return $this->db->get($this->table)->row();
        }else{
            return false;
        }
    }
}