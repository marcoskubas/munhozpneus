<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes_model extends CI_Model{
    
    private $table = 'clientes';
    private $view = 'clientes';
    
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
        $this->db->select('id, nome, endereco, celular, telefone, email');
        $this->db->from('clientes');
        return $this->db->get()->result();
    }
    
    public function get_byid($id=NULL){   
        if($id != NULL){
            $this->db->select('cl.id, cl.nome, cl.numero, cl.cpf, cl.complemento, cl.bairro, cl.endereco, cl.celular, cl.telefone, cl.email, cl.idcidade, ci.idestado, ci.descricao cidade');
            $this->db->from('clientes cl');
            $this->db->join('cidades ci','cl.idcidade = ci.id','inner');
            $this->db->where('cl.id',$id);
            return $this->db->get($this->table)->row();
        }else{
            return false;
        }
    }
}