<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library(array('session'));
            $this->load->helper('url');
            $this->load->model('m_login_user');
            $this->load->database();
        }

        public function index(){
            if($this->session->userdata('Login') != 'berhasil'){
                redirect('user/login/login_form');
            }else{
                $data['title']="Dashboard User Pariwisata Indonesia";
                $this->load->model('m_login_user');
                $user = $this->session->userdata('username');       
                $data['pengguna'] = $this->m_login_user->data($user);
                $this->template->load('template_user','user/index', $data);
            }
        }
}