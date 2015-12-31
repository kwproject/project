<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Blog extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->helper('text');
			$this->load->model(array('m_berita','m_login'));
			$this->user = $this->session->userdata('username');
			$this->data = array(
				'title'     => 'Berita',
				'pengguna'	=> $this->m_login->data($this->user),
			);
		}

		function index(){
			$this->data['blog'] = $this->m_berita->AmbilData();
			$this->template->load('template_user','user/berita/berita',$this->data);
		}

		function read(){
			$id=$this->uri->segment(3);
			$this->data['read']=$this->m_berita->Read($id);
			$this->data['blog']=$this->m_berita->AmbilData();
			$this->template->load('template_user','user/berita/read',$this->data);
		} 
	}
?>