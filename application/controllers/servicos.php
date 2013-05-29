<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicos extends CI_Controller{
	
    public function index(){
        $page = array(
            'pagina' => 'servicos',
            'title' => 'Serviços'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('servicos');
        $this->load->view('html_footer');
    }
}