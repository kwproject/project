<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller{
	
	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_register');
        $this->load->database();
	}

	function index(){
		$data['title'] = "Registrasi";
		$this->template->load('template_user','d_user/register',$data);
	}
	function direct(){
		$data['title'] = "Login";
		$this->template->load('template_user','d_user/login_form',$data);
	}
	public function InputData(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Nama Lengkap','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('jenis_kel', 'Jenis Kelamin', 'trim|required');
		
		if($this->form_validation->run()==FALSE){
			$this->index();
		} else {
			$nama 		=$this->input->post('nama');
			$username 	=$this->input->post('username');
			$email 		=$this->input->post('email');
			$password 	=$this->input->post('password');
			$jenis 		= $this->input->post('jenis_kel');
			$alamat 	= $this->input->post('alamat');
			
			$data=array(
				'nama'		=>$nama,
				'username'	=>$username,
				'email'		=>$email,
				'password'	=>md5($password),
				'foto'		=>'default.png',
				'active'	=> '0',
				'jenis_kel'	=> $jenis,
				'alamat'	=> $alamat
				);
			$this->m_register->register($data);
			$hasil = $this->m_register->panggildata($username);
			foreach ($hasil->result() as $h) {
				$data['id']	= $h->id_user;
			}
			$encrypted_id = md5($data['id']);
			$this->load->library('email');
			$config = array();
			$config['charset'] 		= 'utf-8';
			$config['useragent'] 	= 'Codeigniter';
			$config['protocol']		= "smtp";
			$config['mailtype']		= "html";
			$config['smtp_host']	= "ssl://pinwheel.indowebsite.net";
			$config['smtp_port']	= "465";
			$config['smtp_timeout']	= "1";
			$config['smtp_user']	= "noreply@kwproject.web.id"; 
			$config['smtp_pass']	= "kwproject12";
			$config['crlf']			="\r\n"; 
			$config['newline']		="\r\n"; 
			$config['wordwrap'] 	= TRUE;
				
			$this->email->initialize($config);
			$this->email->from($config['smtp_user'],'KW Project');
			$this->email->to($email);
			$this->email->subject("Verifikasi Akun");
			$this->email->message("Terimakasih telah melakuan Registrasi, Silahkan Aktivasi akun Anda.".
			site_url("user/registrasi/verification/$encrypted_id")
				);
			$this->email->send();
			
			echo " <script>
	                   alert('Pendaftaran sukses, silahkan cek email dan aktivasi akun Anda.');
                   </script>";
            $data['title']="Dashboard User Pariwisata Indonesia";
            $this->load->model('m_login');
            $user = $this->session->userdata('username');       
            $data['pengguna'] = $this->m_login->data($user);
            $this->template->load('template_user','success',$data);
		}
	}
	public function verification($key){
		$this->m_register->changeActiveState($key);
		echo " <script>
                    alert('Selamat Akun Anda telah di Aktivasi <br>
                    Login dengan username dan password yang tadi telah dibuat');
               </script>";
		$this->direct();
	}
}

