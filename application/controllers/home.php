<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	
    public function __construct(){
            parent::__construct();
    }

    public function index(){
        $this->load->view('html_head');
        $this->load->view('login');
        $this->load->view('html_footer');
    }

    public function login(){		
        $usuario = $this->input->post('usuario');
        $senha = $this->input->post('senha');
        $this->db->where('email',$usuario);
        $this->db->where('pasw',md5($senha));
        $this->db->where('block','N');
        $usuario = $this->db->get('usuarios')->result();		
        if(count($usuario)===1){
            $dados = array(
                'usuario'  => $usuario[0]->usuario,
                'logado' => TRUE
             );
            $this->session->set_userdata($dados);
            redirect(base_url()."agendamentos");
        }
        else{
                redirect(base_url()."home/index");
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url()."home/index");
    }
}