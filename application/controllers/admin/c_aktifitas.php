<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_aktifitas extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model(	'm_login');
		if ($this->session->userdata('isLogin') != 'berhasil') {

			redirect('login/login_form');
		}
		$this->user 	= $this->session->userdata('username');
		$this->id_user	= $this->session->userdata('id');

		$this->data = array(

			'lihat_aktifitas'	=> array(

				'heading1'		=> 'Aktifitas',
				'heading2'		=> 'Rekomendasi User',
				'heading3'		=> 'Aktifitas Admin',
				'title'			=> 'History',
				'pengguna'		=> $this->m_login->dataPengguna($this->user),
			),

		);
	}
	public function index()
	{
		$this->template->load('template','admin/history/lihat_aktifitas',$this->data['lihat_aktifitas']);
	}
}

/* End of file c_report.php */
/* Location: ./application/controllers/admin/c_report.php */