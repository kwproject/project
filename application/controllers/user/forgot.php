<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class forgot extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','email'));
		$this->load->model('m_verifikasi');
        $this->load->database();
	}
	function index(){
		$this->template->load('template_user','d_user/forgot_password');
	}

	public function v_password(){
		
		$this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email');
		if($this->form_validation->run()==FALSE){
			$this->index();
		}else{
			$email=$this->input->post('email');
			$data=array(
				'verifikasi_email'=>$email);
			$this->m_verifikasi->verifikasi($data);
			$config = array();
			$config['charset'] 		= 'utf-8';
			$config['useragent'] 	= 'Codeigniter';
			$config['protocol']		= "smtp";
			$config['mailtype']		= "html";
			$config['smtp_host']	= "ssl://pinwheel.indowebsite.net";
			$config['smtp_port']	= "465";
			$config['smtp_timeout']	= "10";
			$config['smtp_user']	= "noreply@kwproject.web.id"; 
			$config['smtp_pass']	= "kwproject12";
			$config['crlf']			="\r\n"; 
			$config['newline']		="\r\n"; 
			$config['wordwrap'] 	= TRUE;
					
			$this->email->initialize($config);
			$this->email->from($config['smtp_user'],'KW Project');
			$this->email->to($email);
			$this->email->subject("Pemulihan Passowrd");
			$this->email->message("Silahkan login kembali dengan password ini <br> password: indonesia");
			$this->email->send();
		}
		$this->index();
	}

	function update_password(){
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
		if($this->form_validation->run()==FALSE){
			$this->index();
		} else {
			$password 	=$this->input->post('password');
			$data=array(
				'password'=>$password);
			$this->m_register->update_password($data);
		}
		
	}
}

