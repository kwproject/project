<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_jenis_pariwisata extends CI_Model{

		public $table = 'jenis_pariwisata';
	    public function __construct() {
	        parent::__construct();
	    }
	    
	    
	    function AmbilData(){
	        
	        return $this->db->get_where($this->table);        
	    }
	    
	    function getOne($data){
	        
	        $this->db->select('*');
	        $this->db->from($this->table);
	        $this->db->where($data);
	        $query = $this->db->get();
	        return $query;
	    }
   
	}
?>