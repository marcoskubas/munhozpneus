<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller{
	
    public function index(){
        $page = array(
            'pagina' => 'usuarios',
            'title' => 'Usuários'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('usuarios');
        $this->load->view('html_footer');
    }
}