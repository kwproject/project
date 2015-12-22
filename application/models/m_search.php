<?php  
	class M_search extends CI_Model {
		public function __construct()
		{
			$this->load->database();
		}
		public function search()
		{
			$cari = $this->input->GET('q', TRUE);
			$data = $this->db->query("SELECT *FROM `pariwisata` WHERE nm_pariwisata like '%$cari%' or deskripsi like '%$cari%'");
			return $data->result();
		}
	}

?>