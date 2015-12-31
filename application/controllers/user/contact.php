<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Contact extends CI_Controller{

		function __construct(){
			parent::__construct();
	        $this->load->library('form_validation');
	        $this->load->model(array('m_contact','m_login'));
	        $this->load->database();
	        $this->user = $this->session->userdata('username');
	        $this->data = array(
	        	'contact'		=> array(
	        		'title'		=> 'Kontak',
	        		'pengguna'	=> $this->m_login->data($this->user),
	        	),
	        );
		}
		
		function index(){
			$this->template->load('template_user','user/contact',$this->data['contact']);
		}
		function InputData(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nama','Nama Lengkap','trim|require');
			$this->form_validation->set_rules('email','Alamat Email','trim|require|valid_email');
			$this->form_validation->set_rules('message','Pesan','trim|required');
			if($this->form_validation->run()==FALSE){
				$this->index();
			}else{
				$nama		=$this->input->post('nama');
				$email 		=$this->input->post('email');
				$message 	=$this->input->post('message');

				$data=array(
					'nama'		=>$nama,
					'email'		=>$email,
					'message'	=>$message
					);
				$this->m_contact->InputData($data);
				echo "<script>
	             alert('Pesan Anda telah kami terima, Terima Kasih.');
                 </script>";
			}
			$this->index();
		}
	}
?>