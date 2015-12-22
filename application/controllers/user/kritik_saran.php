<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Kritik_saran extends CI_Controller{

		function __construct(){
			parent::__construct();
	        $this->load->library('form_validation');
	        $this->load->model(array('m_kritik_saran','m_login'));
	        $this->load->database();
			$this->user = $this->session->userdata('username');
			$this->data = array(

				'kritik'	=> array(
					'title'	=> 'Kritik Dan Saran',
					'pengguna'	=> $this->m_login->data($this->user),
				),
			);
		}
		
		function index(){
			$this->template->load('template_user','user/kritik_saran',$this->data['kritik']);
		}
		function InputData(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul','Judul','trim|require');
			$this->form_validation->set_rules('deskripsi','Deskripsi Kritik Saran','trim|required');
			if($this->form_validation->run()==FALSE){
				$this->index();
			}else{
				$judul 		=$this->input->post('judul');
				$deskripsi 	=$this->input->post('deskripsi');

				$data=array(
					'judul'		=>$judul,
					'deskripsi'	=>$deskripsi
					);
				$this->m_kritik_saran->kritik_saran($data);
				echo "<script>
	             alert('Terima Kasih atas Kritik dan Saran Anda');
                 </script>";
			}
			$this->index();
		}
	}
?>