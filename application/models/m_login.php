<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    class M_login extends CI_Model{

        public $table = 'user';
        public function __construct(){

        }

        public function getPengguna($username, $password){
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $query = $this->db->get();
            return $query;
        }

        public function data($username){
            $this->db->select('*');
            $this->db->where('username', $username);
            $query = $this->db->get('user');
            return $query->row();
        }
        
        function ambilData($id_user){

            $this->db->select('*');
            $this->db->where('id_user',$id_user);
            $this->db->from('user');
            return $query = $this->db->get();

        }
        
        function updateProfile($data,$id_user){
            
            $this->db->where('id_user',$id_user);
            $this->db->update('user',$data);
        }
    }