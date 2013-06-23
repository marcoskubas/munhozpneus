<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actions extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
            redirect(base_url()."home");
        }
    }
    
    public function addproduct($idAgenda, $idProduto, $qtdeProduto){
        $this->load->model('itens_model','itens');
        $data = array(
            'idagenda' => $idAgenda,
            'idproduto' => $idProduto,
            'idservico' => 0,
            'quantidade' => $qtdeProduto,
            'tipo' => 'P'
        );
        $idItem = $this->itens->do_insert($data);
        $produto = $this->itens->get_byidProduto($idProduto);
        $data['idItem'] = $idItem;
        $data['descricao'] = $produto->descricao;
        $this->load->view('ajax/newproduct', $data);
    }
    
    public function addservice($idAgenda, $idServico, $qtdeServico){
        $this->load->model('itens_model','itens');
        $data = array(
            'idagenda' => $idAgenda,
            'idproduto' => 0,
            'idservico' => $idServico,
            'quantidade' => $qtdeServico,
            'tipo' => 'S'
        );
        $idItem = $this->itens->do_insert($data);
        $servico = $this->itens->get_byidServico($idServico);
        $data['idItem'] = $idItem;
        $data['descricao'] = $servico->descricao;
        $this->load->view('ajax/newservice', $data);
    }
    
    public function deleteitem($idItem){
        if($idItem > 0){
            $this->load->model('itens_model','itens');
            $this->itens->do_delete(array('id' => $idItem));
        }
    }
}