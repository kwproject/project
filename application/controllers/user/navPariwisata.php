<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NavPariwisata extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model(array('m_provinsi','m_login','m_navParis','m_jenis_pariwisata'));
		$user = $this->session->userdata('username');	
		$this->data = array(
			'title'		=> 'Pariwisata',	
			'heading' 	=> 'Pilih Lokasi',
			'heading1' 	=> 'Hasil Pariwisata',
			'prov'    	=> $this->m_provinsi->AmbilData(),
			'pengguna'	=> $this->m_login->data($user),
			'jenis'		=> $this->m_jenis_pariwisata->AmbilData()
		); 	
	}


	public function index()
	{
		if (isset($_POST['submit'])) {
			$hasil = $this->m_navParis->getPariwisata();
			if ($hasil==NULL) {

				$this->data['notif'] = "Data tidak ada"; 
				$this->template->load('tpariwisata','user/pariwisata',$this->data);	
			} else {
				$this->data['record'] = $hasil;
				$this->template->load('tpariwisata','user/pariwisata',$this->data);	
			}
			
		} else {
			$hasilAll = $this->m_navParis->getPariwisataAll();
			$this->data['record'] = $hasilAll;
			$this->template->load('tpariwisata','user/pariwisata',$this->data);		
		}
	}

	public function add_kota($id){
		$hasil  = $this->m_navParis->getKota($id);
		foreach ($hasil as $h) {
			$data .= "<option value='".$h->id_kota."'>".$h->nm_kota."</option>";
		}
		echo $data;
	}

	public function lihat_pariw(){
		$hasil = $this->m_navParis->getData();
		foreach($hasil as $h){
			$data = $h->id_jenis_pariwisata;
		}
		$id = $data;
		$id_par = $this->uri->segment(4);
		$this->data['suggest'] = $this->m_navParis->getSuggest($id,$id_par);
		$this->data['data']    = $this->m_navParis->getData();
		$this->data['image']   = $this->m_navParis->getImage();
		$this->template->load('template_user','user/lihat_pariw',$this->data);
	}

}

/* End of file navPariwisata.php */
/* Location: ./application/controllers/user/navPariwisata.php */