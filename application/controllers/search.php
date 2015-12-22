<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

	class search extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model(array('m_search','m_pariwisata','m_jenis_pariwisata'));
		}

		public function index(){
			$data2['cari'] = $this->m_search->search();
			$this->template->load('template_user','user/search', $data2);
		}
	}
?>