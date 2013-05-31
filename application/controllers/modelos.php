<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelos extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados página acessada
        $page = array(
            'pagina' => 'modelos',
            'title' => 'Modelos'
        );
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('m.id, m.descricao, ma.descricao marca');
        $this->db->from('modelos m');
        $this->db->join('marcas ma','m.idmarca = ma.id','inner');
        $this->db->order_by('m.descricao','ASC');
        //Recebendo os dados das cidades
        $data['records'] = $this->db->get()->result();
        //Configuração Listagem Registros
        $data['fields'] = array(
                            'id' => 'Código',
                            'descricao' => 'Descrição',
                            'marca' => 'Marca'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('modelos', $data);
        $this->load->view('html_footer');
    }
}