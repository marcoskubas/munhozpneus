<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layout extends CI_Controller{
	
    public function index(){
        $data = array(
            'pagina' => 'home'
        );
        $this->load->view('layout', $data);
    }
}