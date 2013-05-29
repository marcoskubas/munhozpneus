<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelos extends CI_Controller{
	
    public function index(){
        $page = array(
            'pagina' => 'modelos',
            'title' => 'Modelos'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('modelos');
        $this->load->view('html_footer');
    }
}