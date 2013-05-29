<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agendamentos extends CI_Controller{
	
    public function index(){
        $page = array(
            'pagina' => 'agendamentos',
            'title' => 'Agendamentos / Orçamentos'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('agendamentos');
        $this->load->view('html_footer');
    }
}