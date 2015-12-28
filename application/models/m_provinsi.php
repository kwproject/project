<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_provinsi extends CI_Model{
    
    public $table = 'provinsi';
    public function __construct() {
        parent::__construct();
    }
    
    function InputData($data){
        $this->db->insert($this->table,$data);
    }
    
    function AmbilData(){
        
        $query = $this->db->get_where($this->table);
        if ($query->num_rows() > 0) {
           return $query->result();
        } else {
            return null;
        }        
    }
    
    function getOne($data){
        
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($data);
        $query = $this->db->get();
        return $query;
    }
    
    function updateData($data,$id){
        
        $query = $this->db->update($this->table,$data,array('id_prov'=>$id));
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    function deleteData($data){
        
        $query = $this->db->delete($this->table,$data);
        if($query){
            
            return TRUE;
            
        }else{
            
            return FALSE;
        }
    }

    
}
