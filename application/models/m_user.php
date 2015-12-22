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
    
    function countPesan($id){
        
        $this->db->where('id_user',$id);
        $this->db->select('*');
        $this->db->from('pesan');
        return $this->db->get();
        
    }

    function getProvinsi(){
    	$query = $this->db->get('provinsi');
    	if ($query->num_rows > 0) {
    		
			return $query->result_array();
    	}else {

    		return array();
    	}
    }

    function getKota($id_prov){
        
        $this->db->where('id_prov',$id_prov);
        $query = $this->db->get('kota');
        if ($query->num_rows() > 0 ) {
        	return 	$query->result_array();
        }else {
        	return array();
        }
    }

}

/* End of file m_user.php */
/* Location: ./application/models/m_admin.php */