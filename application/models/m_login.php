<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class M_login extends CI_Model{

        public $table = 'user';
        public function __construct(){

        }

        public function ambilPengguna($username, $password, $status){
                $this->db->select('*');
            $this->db->from('user');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $this->db->where('status', $status);
            $query = $this->db->get();
        return $query;
        }

        public function dataPengguna($username){
        $this->db->select('*');
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        return $query->row();
        }
        
        function inputRegis($data){
            
            $this->db->insert($this->table, $data);
        }
}