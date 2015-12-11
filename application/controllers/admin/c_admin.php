<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

    public function __construct(){
            parent::__construct();
             $this->load->library('upload');
             $this->load->library('form_validation');
            $this->load->model(array('m_login','m_pariwisata','m_provinsi','m_kota','m_jenis_pariwisata','m_admin'));
            if($this->session->userdata('islogin') != 'berhasil'){
               redirect('login/login_form');
            }
    $this->user 		= $this->session->userdata('username');
    $this->id_user 		= $this->session->userdata('id');
            $this->data = array(

                    'profile' => array(
                        'title'     => "Setting Profiles",
                        'heading'   => "Profile",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login->dataPengguna($this->user),
                    ),
            );
    }
    private function setup_upload_option(){

        $config = array();
        $config['upload_path']      = './uploads/user/';
        $config['allowed_types']    = 'jpg|png|gif';
        $config['overwrite']        = 'False';
        return $config;
    }
    public function index()
    {
            $id = $this->session->userdata('id');
            $this->data['profile']['record'] = $this->m_admin->ambilData($id);
            $this->template->load('template','admin/user/profile',$this->data['profile']);
    }
    
    function updateProfile(){
        
        if (isset($_POST['submit'])) {
            $id             = $this->session->userdata('id');
            $nama           = $this->input->post('nama');
            $email          = $this->input->post('email');
            $alamat         = $this->input->post('alamat');
            $foto           = $this->input->post('userfile');
            $this->upload->initialize($this->setup_upload_option());
            if($this->upload->do_upload()==false){
                
                $data = array(
                    
                    'nama'      => $nama,
                    'email'     => $email,
                    'alamat'    => $alamat,
                );
                
            } else {
                
                $img    = $this->upload->data();
                $path   = $img['file_name'];
                $data   = array(
                    
                    'nama'      => $nama,
                    'email'     => $email,
                    'alamat'    => $alamat,
                    'foto'      => $path
                    
                );
                
            }
            
            $this->m_admin->updateProfile($data,$id);
            echo "<script>
                    alert('file Tersimpan')
                </script>";
            $data['title']="Dashboard Pariwisata Indonesia";
            $this->load->model('m_login');
            $user = $this->session->userdata('username');
            $data['level'] = $this->session->userdata('level');        
            $data['pengguna'] = $this->m_login->dataPengguna($user);
            $this->template->load('template','admin/dashboard/dashboard', $data);
            
        } else {
            
            $id = $this->session->userdata('id');
            $this->data['profile']['record'] = $this->m_admin->ambilData($id);
            $this->template->load('template','admin/user/profile',$this->data['profile']);
        }
    }
}

/* End of file c_admin.php */
/* Location: ./application/controllers/admin/c_admin.php */