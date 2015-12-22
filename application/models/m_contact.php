<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_contact extends CI_Model{

	public $table = 'contact';
	
	public function __construct(){
        parent:: __construct();
	}

	function InputData($data){

		$query = $this->db->insert($this->table, $data);
		if($query){
			return true;
		} else {
			return false;
		}
	}

	function AmbilDataContact(){
		$this->db->select('*');
        $this->db->from($this->table);
        return $query = $this->db->get();
	}

	function delete($id_contact){

       	$this->db->where('id_contact',$id_contact);
       	$query = $this->db->delete('contact');
       	if ($query) {
       		return True;
       	}else{
       		return false;
       	}
    }
}