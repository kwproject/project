<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller{
	
	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(array('m_register','m_login_user'));
        $this->load->database();
	}

	function index(){

		$this->template->load('template_user','d_user/register');
	}

	function direct(){
		
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|md5|xss_clean');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        if($this->form_validation->run()==FALSE){
            $this->template->load('template_user','d_user/login_form');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $cek 	  = $this->m_login_user->getPengguna($username, $password);

            if($cek->num_rows() == 1){
                foreach ($cek->result() as $c) {
                    $data_user['Login']       = 'berhasil';
                    $data_user['username']    = $c->username;
                    $data_user['id_user']     = $c->id_user;
                    $data_user['nama']        = $c->nama;
                    $this->session->set_userdata($data_user);
                }
                redirect('user/home');
            }
        }
	}
	public function InputData(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Nama Lengkap','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
		
		if($this->form_validation->run()==FALSE){
			$this->index();
		} else {
			$nama 		=$this->input->post('nama');
			$username 	=$this->input->post('username');
			$email 		=$this->input->post('email');
			$password 	=$this->input->post('password');
			
			$data=array(
				'nama'		=>$nama,
				'username'	=>$username,
				'email'		=>$email,
				'password'	=>md5($password),
				'foto'		=>'default.png'
				);
			$id=$this->m_register->register($data);
			$encrypted_id = md5($id);
			$this->load->library('email');
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
			$this->email->subject("Verifikasi Akun");
			$this->email->message("terimakasih telah melakuan registrasi");
			$this->email->send();
			
			$this->direct();
		}
	}
}

