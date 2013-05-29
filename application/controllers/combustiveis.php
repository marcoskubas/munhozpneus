<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Combustiveis extends CI_Controller{
	
    public function index(){
        $page = array(
            'pagina' => 'combustiveis',
            'title' => 'Combustiveis'
        );
        $this->load->view('html_head');
        $this->load->view('html_header', $page);
        $this->load->view('html_menu', $page);
        $this->load->view('combustiveis');
        $this->load->view('html_footer');
    }
}