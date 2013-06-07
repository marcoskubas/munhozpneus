<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agendas_model extends CI_Model{
    
    private $id;
    private $idcliente;
    private $idveiculo;
    private $data_agenda;
    private $hora_agenda;
    private $comentarios;
    
    function __construct(){
        parent::__construct();
    }
    
    public function listar_agendas(){
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('a.id, c.nome, CONCAT(m.descricao," ",placa) AS veiculo, a.data_agenda, a.hora_agenda', FALSE);
        $this->db->from('agendas a');
        $this->db->join('clientes c','a.idcliente = c.id','inner');
        $this->db->join('veiculos v','a.idveiculo = v.id','inner');
        $this->db->join('modelos m','v.idmodelo = m.id','inner');
        $this->db->order_by('c.nome','ASC');		
        //Recebendo os dados das agendas
        return $this->db->get()->result();
    }
}