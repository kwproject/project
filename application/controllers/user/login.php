<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model('m_login_user');
                $this->load->library(array('form_validation','session'));
                $this->load->database();
                $this->load->helper('url');
        }

        public function index(){
                $session = $this->session->userdata('Login');
                if($session != 'berhasil'){
                        $this->template->load('template_user','d_user/login_form');
                }else{
                        redirect('user/home');
                }
        }

        public function login_form(){
            if ($this->session->userdata('Login')== 'berhasil') {
                redirect('user/home');
            }
            $data['title']="Login";
            $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|md5|xss_clean');
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            if($this->form_validation->run()==FALSE){
                $this->template->load('template_user','d_user/login_form');
            }else{
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $cek= $this->m_login_user->getPengguna($username, $password);

                if($cek->num_rows() == 1){
                        foreach ($cek->result() as $c) {
                            $data_user['Login']       = 'berhasil';
                            $data_user['username']    = $c->username;
                            $data_user['id_user']     = $c->id_user;
                            $data_user['nama']        = $c->nama;
                            $this->session->set_userdata($data_user);
                        }
                        redirect('user/home');
                }else{
                        echo " <script>
                                            alert('Gagal Login: Cek username dan password anda!');
                                            history.go(-1);
                                        </script>";
                }
            }
        }
        public function logout(){
                $this->session->sess_destroy();
                redirect('user/home');
        }
        
       
}