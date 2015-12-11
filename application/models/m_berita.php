<?php 

class M_berita extends CI_Model{
    
    public function __construct() {
        parent::__construct();
   		$this->table = "berita";    
    }
    
    public function InputData($data){
        
        $query = $this->db->insert($this->table,$data);
        return $query;
    }
    
    public function AmbilData(){
        
        $this->db->select('*');
        $this->db->from($this->table);
        return $query = $this->db->get();
    }
    
    function editData($id){
        
        $this->db->select('*');
        $this->db->where('id_berita',$id);
        $this->db->from($this->table);
        return $query = $this->db->get();
    }
    
    function updateData($id,$data){
        
        $this->db->where('id_berita',$id);
        $this->db->update($this->table,$data);
    }
    
    function delete($id){
        
        $this->db->where('id_berita',$id);
        $this->db->delete($this->table);
    }
}