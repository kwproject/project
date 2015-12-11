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

		$query = "	SELECT a.aktifitas, a.tanggal, u.username 
					FROM aktifitas as a, user as u 
					WHERE a.id = u.id";
		return $this->db->query($query);
	}

}

/* End of file m_history.php */
/* Location: ./application/models/m_history.php */