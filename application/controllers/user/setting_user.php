<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	class Setting_user extends CI_Controller{
		public function __construct(){
            parent::__construct();
             $this->load->library(array('session','upload'));
             $this->load->library('form_validation');
            $this->load->model(array('m_user','m_login_user'));
            if ($this->session->userdata('level')==1) {
                echo "  <script>
                            alert('Ini akses untuk User');
                        </script>";
            }elseif ($this->session->userdata('Login')!='berhasil') {
                redirect('login');  
            } 
            $this->user         = $this->session->userdata('username');
            $this->id_user      = $this->session->userdata('id_user');
                    $this->data = array(

                            'profile'   => array(
                            'title'     => "Setting Profiles",
                            'heading'   => "Profile",
                            'pengguna'  => $this->m_login_user->data($this->user),
                            'count'     => $this->m_user->countPesan($this->id_user)->num_rows(), 
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
            $id_user = $this->session->userdata('id_user');
            $this->data['profile']['record']= $this->m_login_user->ambilData($id_user);
            $this->template->load('dashboard_user','d_user/profile',$this->data['profile']);
        }
        
        function updateProfile(){
            
            if (isset($_POST['submit'])) {
                
                $id_user        = $this->session->userdata('id_user');
                $nama           = $this->input->post('nama');
                $email          = $this->input->post('email');
                $alamat         = $this->input->post('alamat');
                $foto           = $this->input->post('foto');
                
                $this->load->library('upload');
                $this->upload->initialize($this->setup_upload_option());
                if($this->upload->do_upload() == false){
                    
                    
                    $hasil = $this->m_login_user->updateProfile($data,$id_user);
                    $this->data['profile']['record'] = $this->m_login_user->ambilData($id_user);
                    $this->data['profile']['notif']  = "Gagal";
                    $this->template->load('dashboard_user','d_user/profile',$this->data['profile']);
                    
                }else{
                    
                 
                    if(isset($foto)){
                        
                        $image = $this->upload->data();
                        $path = $image['file_name'];
                        $data = array (

                            'nama'      => $nama,
                            'email'     => $email,
                            'alamat'    => $alamat,
                            'foto'      => $path

                        );
                        
                    }else{
                        
                        $data = array (
                            
                            'nama'      => $nama,
                            'email'     => $email,
                            'alamat'    => $alamat,
                        ); 
                    }
                    $hasil = $this->m_login_user->updateProfile($data,$id_user);
                    $this->data['profile']['record'] = $this->m_login_user->ambilData($id_user);
                    echo " <script>
                                alert('Tersimpan');
                                history.go(-1);
                            </script>";

                }
            }
        }
	}
?>