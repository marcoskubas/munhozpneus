<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Veiculos_model extends CI_Model{
    
    private $table = 'veiculos';
    private $view  = 'veiculos';
    
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
        $this->db->select('v.id, c.nome, ma.descricao marca, m.descricao modelo, v.placa');
        $this->db->from('veiculos v');
        $this->db->join('clientes c','v.idcliente = c.id','inner');
        $this->db->join('modelos m','v.idmodelo = m.id','inner');
        $this->db->join('marcas ma','m.idmarca = ma.id','inner');
        $this->db->order_by('c.nome','ASC');
        return $this->db->get()->result();
    }
    
    public function get_byid($id=NULL){   
        if($id != NULL){
            $this->db->select('v.*, m.idmarca');
            $this->db->from('veiculos v');
            $this->db->join('modelos m','v.idmodelo = m.id','inner');
            $this->db->where('v.id',$id);
            return $this->db->get($this->table)->row();
        }else{
            return false;
        }
    }
}