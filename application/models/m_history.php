<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_history extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->table = "aktifitas";
		}

	public function inputAktifitas($laporan){

		$this->db->insert($this->table,$laporan);
	}

	public function ambilData(){

		$query = "	SELECT a.aktifitas, a.tanggal, ad.username 
					FROM aktifitas as a, admin as ad 
					WHERE a.id = ad.id
					ORDER BY a.tanggal DESC";
		return $this->db->query($query);
	}

}

/* End of file m_history.php */
/* Location: ./application/models/m_history.php */