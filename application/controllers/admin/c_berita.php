<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_berita extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->model(array('m_login','m_pariwisata','m_provinsi','m_kota','m_jenis_pariwisata','m_berita'));                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
        if($this->session->userdata('isLogin') != 'berhasil'){
            redirect('login/login_form');
        }
        $this->user = $this->session->userdata('username');
        $this->data = array(

            'lihat_data' => array(

                'heading'   => "Data Berita",
                'title'     => "Berita",
                'level'     => $this->session->userdata('level'),
                'pengguna'  => $this->m_login->dataPengguna($this->user)
            ),
            'input_data'    => array(

                'heading'   => "Input Data Berita",
                'title'     => "Berita",
                'level'     => $this->session->userdata('level'),
                'pengguna'  => $this->m_login->dataPengguna($this->user),
            ),
            'form_edit'     => array(
                
                'heading'   => "Edit Data Berita",
                'title'     => "Berita",
                'level'     => $this->session->userdata('level'),
                'pengguna'  => $this->m_login->dataPengguna($this->user),
            )
        );   
    }
    public function index()
    {
        $this->data['lihat_data']['record'] =   $this->m_berita->AmbilData();
        $this->template->load('template','admin/berita/lihat_data',$this->data['lihat_data']);
    }

     private function setup_upload_option(){

            $config = array();
            $config['upload_path']      = './uploads/berita';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = 'False';
            return $config;
    }

    public function inputData(){

        if(isset($_POST['submit'])){

            $rules = array(

                array(

                    'field' => 'judul',
                    'label' => 'Judul',
                    'rules' => 'required'
                ),
                array(

                    'field' => 'isi',
                    'label' => 'Judul',
                    'rules' => 'required'  
                )
            );

            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                
                $this->template->load('template','admin/berita/input_data',$this->data['input_data']);

            } else {

                
                $this->upload->initialize($this->setup_upload_option());

                if($this->upload->do_upload() == false){

                    echo "<script>
                            alert('Gagal Menyimpan')
                            history.go(-1)
                          </script>";

                } else {

                    $image = $this->upload->data();
                    $file_name  = $image['file_name'];
                    $judul      = $this->input->post('judul');
                    $isi        = $this->input->post('isi');
                    $date       = $datetime = date('Y-m-d H:i:s');
                    $data = array(

                        'judul_berita'      => $judul,
                        'isi_berita'        => $isi,
                        'foto_berita'       => $file_name,
                        'tanggal'           => $date
                    );

                    $hasil = $this->m_berita->InputData($data);
                    if ($hasil==1) {
                        echo "<script>
                            alert('Tersimpan')
                        </script>";
                        $this->data['lihat_data']['record'] =   $this->m_berita->AmbilData();
                        $this->template->load('template','admin/berita/lihat_data',$this->data['lihat_data']);
                    } else {

                         echo "<script>
                            alert('Gagal Tersimpan')
                            history.go(-2)
                        </script>";
                        $this->template->load('template','admin/berita/input_data',$this->data['input_data']);
                    }  
                }   
            }
        } else {

            $this->template->load('template','admin/berita/input_data',$this->data['input_data']);
        }
    }
    
    function Edit(){
        
        if(isset($_POST['submit'])){
            
            $id         = $this->input->post('id');
            $judul      = $this->input->post('judul');
            $isi        = $this->input->post('isi');
            $foto       = $this->input->post('userfile');
            $rules = array(

                array(

                    'field' => 'judul',
                    'label' => 'Judul',
                    'rules' => 'required'
                ),
                array(

                    'field' => 'isi',
                    'label' => 'Isi Berita',
                    'rules' => 'required'  
                )
            );
            $this->form_validation->set_rules($rules);
            if($this->form_validation->run()==false){
                $this->data['form_edit']['record'] = $this->m_berita->editData($id);
                $this->template->load('template','admin/berita/form_edit',$this->data['form_edit']);
                
            }else{
                 
                $this->upload->initialize($this->setup_upload_option());
                if($this->upload->do_upload() == false){
                    
                    
                    $data = array(
                        
                        'judul_berita'  => $judul,
                        'isi_berita'    => $isi,
                    );
                    
                } else {
                    
                    $image = $this->upload->data();
                    $file_name  = $image['file_name'];
                    $data = array(
                        
                        'judul_berita'  => $judul,
                        'isi_berita'    => $isi,
                        'foto_berita'   => $file_name
                    );
                }
                $this->m_berita->updateData($id,$data);
                echo "<script>
                        alert('Tersimpan')
                    </script>";
                $this->data['lihat_data']['record'] =   $this->m_berita->AmbilData();
                $this->template->load('template','admin/berita/lihat_data',$this->data['lihat_data']);
            }
        } else {
            
            $id = $this->uri->segment(4);
            $this->data['form_edit']['record'] = $this->m_berita->editData($id);
            $this->template->load('template','admin/berita/form_edit',$this->data['form_edit']);
        }
    }
    
    function delete(){
        
        $id = $this->uri->segment(4);
        $this->m_berita->delete($id);
        echo '<script>
                alert("berhasil  delete")
              </script>';
        $this->data['lihat_data']['record'] =   $this->m_berita->AmbilData();
        $this->template->load('template','admin/berita/lihat_data',$this->data['lihat_data']);
    }

}

/* End of file c_berita.php */
/* Location: ./application/controllers/admin/c_berita.php */