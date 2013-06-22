<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estados_model extends CI_Model{
    
    private $table = 'estados';
    private $view = 'estados';
    
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
        $this->db->order_by('descricao','ASC');
        return $this->db->get($this->table)->result();
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