<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class M_verifikasi extends CI_Controller{
		public $table = 'verifikasi';
	    public function __construct() {
	        parent::__construct();
	    }
	    
	    function verifikasi($data){
	        $this->load->database();
			$this->db->insert('verifikasi',$data);
			return  mysql_insert_id();
	    }
	}
?>