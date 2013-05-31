<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agendamentos extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'agendamentos',
            'title' => 'Agendamento / Or�amento'
        );
        //Criando querys SQL com JOIN pelo uso do Active Record.		
        $this->db->select('a.id, c.nome, CONCAT(m.descricao," ",placa) AS veiculo, a.data_agenda, a.hora_agenda', FALSE);
        $this->db->from('agendas a');
        $this->db->join('clientes c','a.idcliente = c.id','inner');
        $this->db->join('veiculos v','a.idveiculo = v.id','inner');
        $this->db->join('modelos m','v.idmodelo = m.id','inner');
        $this->db->order_by('c.nome','ASC');		
        //Recebendo os dados das agendas
        $data['records'] = $this->db->get()->result();
        //Configura��o Listagem Registros
        $data['fields'] = array(
                            'id' => 'C�digo',
                            'nome' => 'Cliente',
                            'veiculo' => 'Ve�culo',
                            'data_agenda' => 'Data',
                            'hora_agenda' => 'Hora'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('agendamentos', $data);
        $this->load->view('html_footer');
    }
    
    public function cadastro(){
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'agendamentos',
            'title' => 'Agendamentos / Or�amentos',
            'breadcrumb' => 'Cadastro'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('form_agendamento');
        $this->load->view('html_footer');
    }
}