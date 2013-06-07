<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicos_model extends CI_Model{
    
    function __construct(){
        parent::__construct();
    }
    
    public function listar_servicos(){
        return $this->db->get('servicos')->result();
    }
}