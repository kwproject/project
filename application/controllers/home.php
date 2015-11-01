<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
	class Home extends CI_Controller{
		public function __construct(){
			parent::__construct();
		    $this->load->library(array('session'));
		    $this->load->helper('url');
		    $this->load->model('m_login');
		    $this->load->database();
		}

		public function index(){
			if($this->session->userdata('isLogin') == FALSE){
      			redirect('login/login_form');
    		}else{
    			$data['title']="Dashboard Pariwisata Indonesia";
			    $this->load->model('m_login');
			    $user = $this->session->userdata('username');
			    $data['level'] = $this->session->userdata('level');        
			    $data['pengguna'] = $this->m_login->dataPengguna($user);
			    $this->template->load('template','dashboard/dashboard', $data);
    		}
		}
	}