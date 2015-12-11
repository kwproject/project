<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model('m_login');
                $this->load->library(array('form_validation','session'));
                $this->load->database();
                $this->load->helper('url');
        }

        public function index(){
            if ($this->session->userdata('isLogin')=='berhasil') {
                redirect('home','refresh');
            }
            $this->load->view('login');
        }

        public function login_form(){
            $data['title']="Login";
            $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|md5|xss_clean');
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            if($this->form_validation->run()==FALSE){
                $this->load->view('login');
        }else{
                $username   = $this->input->post('username');
                $password   = $this->input->post('password');
                $cek        = $this->m_login->ambilPengguna($username, $password,1);

                if($cek->num_rows() == 1){
                        
                    foreach ($cek->result() as $c) {
                        $user_data['isLogin']       = 'berhasil';
                        $user_data['username']      = $c->username;
                        $user_data['id']            = $c->id;
                        $user_data['nama']          = $c->nama;
                        $this->session->set_userdata($user_data);
                    }
                    redirect('home');
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
                redirect('login');
        }
        
        function register(){
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');   
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            if($this->form_validation->run()==FALSE){
                
                
                
            }else{
                if(isset($_POST['submit'])){

                    $username   = $this->input->post('username');
                    $password   = $this->input->post('password');
                    $nama       = $this->input->post('nama');
                    $email      = $this->input->post('email');
                    $level      = 2;
                    $status     = 2;
                    $data = array(

                        'username'  => $username,
                        'password'  => md5($username),
                        'nama'      => $nama,
                        'email'     => $email,
                        'status'    => $status,
                        'level'     => $level,
                    );

                }else{
                    $this->load->view('admin/register');
                }
            }
        }
}