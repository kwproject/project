<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

	class search extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model(array('m_search','m_pariwisata','m_jenis_pariwisata','m_login'));
			$this->user = $this->session->userdata('username');
			$this->data = array(
				'title' 	=> "Search",
				'pengguna' 	=> $this->m_login->data($this->user),
			);
		}

		public function index(){
			$this->data['cari'] = $this->m_search->search();
			$this->template->load('template_user','user/search', $this->data);
		}
	}
?>