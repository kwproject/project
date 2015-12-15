<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->table = "user";
	}


	function ambilData($id){

		$this->db->select('*');
		$this->db->where('id_user',$id);
		$this->db->from($this->table);
		return $query = $this->db->get();

	}
        
        function updateProfile($data,$id){
            
            $this->db->where('id_user',$id);
            $this->db->update($this->table,$data);
            
        }

}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */