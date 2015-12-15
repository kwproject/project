<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

    class C_info extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model(array('m_history','m_login','m_info'));
            if($this->session->userdata('isLogin') != 'berhasil'){
                redirect('login');
            }   
            $this->user = $this->session->userdata('username');
            $this->data = array(
                    'input_data'    => array(
                        'heading'   => "Input Info Pariwisata",
                        'title'     => "Input Data Pariwisata Indonesia",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login->dataPengguna($this->user),
                        'record'    => '',
                    ),
                    'lihat_data'    => array(
                        'heading'   => "Info Pariwisata",
                        'title'     => "Data Pariwisata Indonesia",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login->dataPengguna($this->user),
                    ),
                    'form_edit'     => array(
                        
                        'heading'   => "Form Edit Info Pariwisata",
                        'title'     => "Edit Data Pariwisata Indonesia",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login->dataPengguna($this->user),
                    ),
                    
            );
        }
        
        function index(){

            if($this->session->userdata('isLogin') != 'berhasil'){
                redirect('login');
            }else{
                $this->data['lihat_data']['record']=$this->m_info->AmbilData();
                $this->template->load('template','admin/info/lihat_data',$this->data['lihat_data']);  
            }
        }

        function InputData(){

           
            $this->form_validation->set_rules('isi','Isi Info','required|trim|xss_clean');
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            if(isset($_POST['submit'])) {
                if($this->form_validation->run()==FALSE){
                    $this->data['input_data']['record'] = $this->m_info->AmbilData();
                    $this->template->load('template','admin/info/input_data',$this->data['input_data']);
                }else{
                    $isi        = $this->input->post('isi');
                    $date       = gmdate("Y-m-d H:i:s", time()+60*60*7);
                    $input      = array(
                            'isi_info'      =>$isi,
                            'tanggal'       =>$date
                    );
                    $id      = $this->session->userdata('id');
                    $date    = gmdate("Y-m-d H:i:s", time()+60*60*7);
                    $laporan = array(

                        'id'            => $id,
                        'aktifitas'     => 'Telah melakukan Input data pada Pariwisata '.$isi.'',
                        'tanggal'       => $date,

                    );
                    $this->m_history->inputAktifitas($laporan);
                    $hasil = $this->m_info->InputData($input);
                    $this->data['input_data']['notif'] = "Success";
                    $this->data['input_data']['record'] = $this->m_info->AmbilData();
                    $this->template->load('template','admin/info/input_data',$this->data['input_data']);
                }

            }else{
                $this->data['input_data']['record'] = $this->m_info->AmbilData();
                $this->template->load('template','admin/info/input_data',$this->data['input_data']);
            }
        }

        function LihatData(){
           
            $this->data['lihat_data']['record']=$this->m_info->AmbilData();
            $this->template->load('template','admin/info/lihat_data',$this->data['lihat_data']);
        }

    }

?>