<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
	
	public function __construct()
	{
        parent::__construct();
        //$this->load->library('form_validation');
        $this->load->model('m_register');
	}

	

	function index(){

		$this->load->view('registrasi');
	}

	function masuk(){

		$rules = array(

			array(

				'field' => 'username',
				'label'	=> 'Username',
				'rules'	=> 'required|is_unique|max_length[15]|min_length[5]'
			),
			array(

				'field' => 'password',
				'label'	=> 'Password',
				'rules'	=> 'required|min_length[8]|matches[username]',

			),
			array(

				'field' => 'nama',
				'label'	=> 'Nama',
				'rules'	=> 'required|mix_length[3]|'
			),
			array(

				'field'	=> 'email',
				'label'	=> 'Email',
				'rules'	=> 'required|valid_email'
			)

		);
		$this->form_validation->set_rules($rules);
		if(isset($_POST['submit'])){
			if($this->form_validation->run()==TRUE){

				$username 	= $this->input->post('username');
				$password 	= $this->input->post('password');
				$email 		= $this->input->post('email');
				$nama	 	= $this->input->post('nama');
				$alamat 	= $this->input->post('alamat');
				$jenis_kel 	= $this->input->post('jenis_kelamin');
				//$foto 		= $this->input->post('foto');
				$data 		= array(

					'username'	=> $username,
					'password'	=> md5($password),
					'email'		=> $email,
					'nama'		=> $nama,
					'alamat'	=> $alamat,
					'jenis_kel'	=> $jenis_kel,
					'foto'		=> $foto,
				);

				$daftar = $this->m_register->register($data);
				if($daftar==TRUE){

					$data['info'] = "<p>Berhasil Terdaftar</p>";
					$this->load->view('registrasi',$data);

				} else {

				}
		} else {

			$this->load->view('registrasi');
		}
		}
	}
}

