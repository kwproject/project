<?php 

class M_info extends CI_Model{
    
    public function __construct() {
        parent::__construct();
   		$this->table = "info";    
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
        $this->db->where('id_info',$id);
        $this->db->from($this->table);
        return $query = $this->db->get();
    }
    
    function updateData($id,$data){
        
        $this->db->where('id_info',$id);
        $this->db->update($this->table,$data);
    }
    
    function delete($id){
        
        $this->db->where('id_info',$id);
        $this->db->delete($this->table);
    }
    public function Berita(){
        $q="select * from info where isi_info";
        return $this->db->query($q);
    }
}