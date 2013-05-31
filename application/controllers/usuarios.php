<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller{

    public function index(){
        $this->load->helper('tinytable');
        //Dados p�gina acessada
        $page = array(
            'pagina' => 'usuarios',
            'title' => 'Usu�rios'
        );
        //Criando querys SQL
        $data['records'] = $this->db->get('usuarios')->result();
        //Configura��o Listagem Registros
        $data['fields'] = array(
                            'id' => 'C�digo',
                            'name' => 'Nome',
                            'email' => 'E-mail',
                            'enterdate' => 'Data de Registro',
                            'block' => 'Usu�rio Ativo'
                         );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('usuarios', $data);
        $this->load->view('html_footer');
    }
}