<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library(array('session'));
            $this->load->helper('url');
            $this->load->model(array('m_login','m_history'));
            $this->load->database();
            if($this->session->userdata('level') == 0){
                redirect('user/home');
            }elseif ($this->session->userdata('Login')!='berhasil') {
                redirect('login');  
            } 
            $this->user     = $this->session->userdata('username');
            $this->id_user  = $this->session->userdata('id_user');
            $this->data     = array(

                'lihat_aktifitas'   => array(

                    'heading1'      => 'Aktifitas',
                    'heading2'      => 'Rekomendasi User',
                    'heading3'      => 'Aktifitas Admin',
                    'title'         => 'History',
                    'pengguna'      => $this->m_login->data($this->user),
                ),

            );

        }

        public function index(){
        if($this->session->userdata('level') != 1){
            redirect('login');
        }else{
                $data['title']="Dashboard Pariwisata Indonesia";
                $this->load->model('m_login_user');
                $user = $this->session->userdata('username');
                $this->data['lihat_aktifitas']['level'] = $this->session->userdata('level');        
                $this->data['lihat_aktifitas']['pengguna'] = $this->m_login->data($user);
                $this->data['lihat_aktifitas']['rekomendasi']   = $this->m_history->ambilRekomendasi();
                $this->data['lihat_aktifitas']['aktifitas']     = $this->m_history->ambilData();
                $this->template->load('template','admin/history/lihat_aktifitas',$this->data['lihat_aktifitas']);
            }    
        }
    }