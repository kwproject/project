<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kota extends CI_Model{
    
    public $table = 'kota';
    public function __construct() {
        parent::__construct();
    }
    
    function InputData($data){
        $this->db->insert($this->table,$data);
    }
    
    function AmbilData(){
        
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('nm_kota','ASC');
        $query = $this->db->get();
        return $query;
        
    }
    
    function getOne($data){
        
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($data);
        $query = $this->db->get();
        return $query;
    }
    
    function updateData($data,$id){
        
        $query = $this->db->update($this->table,$data,array('id_kota'=>$id));
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
