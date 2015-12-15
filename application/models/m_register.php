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

		$query = $this->db->insert($this->table, $data);
		if($query){
			return true;
		} else {
			return false;
		}
	}
	function changeActiveState($key){
		$this->load->database();
		$data = array(
               'active' => 1
        );

		$this->db->where('md5(id_user)', $key);
		$this->db->update('user', $data);

		return true;
	}

	function panggilData($username){

		$this->db->where('username',$username);
		$this->db->from('user');
		return $this->db->get();
	}

}