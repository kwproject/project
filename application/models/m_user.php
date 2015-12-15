<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
	public $table = 'user';
	function __construct()
	{
		parent::__construct();
		
	}


	function ambilData($id_user){

		$this->db->select('*');
		$this->db->where('id_user',$id_user);
		$this->db->from('user');
		return $query = $this->db->get();

	}
        
    function updateProfile($data,$id_user){
            
        $this->db->where('id_user',$id_user);
        $this->db->update('user',$data);
            
    }
    
    function countPesan($id_user){
        
        $this->db->where('id_user',$id_user);
        $this->db->select('*');
        $this->db->from('pesan');
        return $this->db->get();
        
    }

}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */