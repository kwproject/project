<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Blog extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->helper('text');
			$this->load->model('m_berita');
			if ($this->session->userdata('Login')!='berhasil') {
	            redirect('login');  
	        } 
		}

		function index(){
			$data['blog']			=$this->m_berita->AmbilDataPage();
			$this->template->load('template_user','user/berita/berita',$data);
		}

		function read(){
			$id=$this->uri->segment(3);
			$data['read']=$this->m_berita->Read($id);
			$data['blog']=$this->m_berita->AmbilData();
			$this->template->load('template_user','user/berita/read',$data);
		} 
	}
?>