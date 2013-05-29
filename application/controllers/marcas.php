<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marcas extends CI_Controller{
	
    public function index(){
        $page = array(
            'pagina' => 'marcas',
            'title' => 'Marcas'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('marcas');
        $this->load->view('html_footer');
    }
}