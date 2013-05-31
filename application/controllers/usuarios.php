<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados página acessada
        $page = array(
            'pagina' => 'usuarios',
            'title' => 'Usuários'
        );
        //Criando querys SQL
        $data['records'] = $this->db->get('usuarios')->result();
        //Configuração Listagem Registros
        $data['fields'] = array(
                            'id' => 'Código',
                            'name' => 'Nome',
                            'email' => 'E-mail',
                            'enterdate' => 'Data de Registro',
                            'block' => 'Usuário Ativo'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('usuarios', $data);
        $this->load->view('html_footer');
    }
}