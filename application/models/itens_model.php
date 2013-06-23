<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Model Itens Agenda
 */
class Itens_model extends CI_Model{
    
    private $table = 'itens_agenda';
    
    function __construct(){
        parent::__construct();
    }
    
    public function do_insert($dados=NULL){
        if($dados != NULL){
            $this->db->insert($this->table, $dados);
            return $this->db->insert_id();
        }else{
            return 0;
        }
    }
    
    public function do_delete($condicao=NULL){
        if($condicao != NULL){
            $this->db->delete($this->table, $condicao);
        }
    }
    
    public function get_byidProduto($id=NULL){   
        if($id != NULL){
            $this->db->where('id',$id);
            return $this->db->get('produtos')->row();
        }else{
            return false;
        }
    }
    
    public function get_byidServico($id=NULL){
        if($id != NULL){
            $this->db->where('id',$id);
            return $this->db->get('servicos')->row();
        }else{
            return false;
        }
    }
}