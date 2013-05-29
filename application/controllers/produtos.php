<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller{
	
    public function index(){
        $page = array(
            'pagina' => 'produtos',
            'title' => 'Produtos'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('produtos');
        $this->load->view('html_footer');
    }
}