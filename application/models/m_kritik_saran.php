<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kritik_saran extends CI_Model{

	public $table = 'kritik_saran';
	
	public function __construct(){
        parent:: __construct();
	}

	function kritik_saran($data){

		$query = $this->db->insert($this->table, $data);
		if($query){
			return true;
		} else {
			return false;
		}
	}

	function AmbilData(){
		$this->db->select('*');
        $this->db->from($this->table);
        return $query = $this->db->get();
	}

	function delete($id){

       	$this->db->where('id',$id);
       	$query = $this->db->delete('kritik_saran');
       	if ($query) {
       		return TRUE;
       	} else {
       		return FALSE;
       	}
    }
}