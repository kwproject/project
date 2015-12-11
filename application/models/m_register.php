<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model
{

	public $table = 'user';
	public function __construct()
	{
        parent:: __construct();
	}

	function register($data){

		$query = $this->db->insert($this->tale, $data);
		if($query){
			return true;
		} else {
			return false;
		}
	}

}