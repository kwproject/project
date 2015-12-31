<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

    class C_pariwisata extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model(array('m_user','m_login_user','m_pariwisata','m_provinsi','m_kota','m_jenis_pariwisata'));
            if ($this->session->userdata('Login')!='berhasil') {
                redirect('login');  
            } 
            $this->id   = $this->session->userdata('id_user');
            $this->user = $this->session->userdata('username');
            $this->data = array(
                    'input_data'    => array(
                        'heading'   => "Input Data Pariwisata",
                        'title'     => "Input Data Pariwisata Indonesia",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login_user->data($this->user),
                        'record'    => '',
                        'count'     => $this->m_user->countPesan($this->id)->num_rows(),
                    ),
                    'lihat_pesan'   => array(
                        
                        'heading'   => "Pesan",
                        'title'     => "Pesan",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login_user->data($this->user),
                        'count'     => $this->m_user->countPesan($this->id)->num_rows(),
                    ),
            );
        }
        
        function index(){

            if($this->session->userdata('Login') == FALSE){
                redirect('login');
            }else{
                $this->data['lihat_data']['record']=$this->m_pariwisata->AmbilData();
                $this->template->load('dashboard_user','d_user/pariwisata/lihat_data',$this->data['lihat_data']);  
            }
        }

        private function setup_upload_option(){

            $config = array();
            $config['upload_path']      = './uploads';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = 'False';
            $config['max_size']         = '1000';
            return $config;
        }

        function InputData(){
            $this->form_validation->set_rules('nama_provinsi', 'Nama Provinsi', 'required|trim|xss_clean');
            $this->form_validation->set_rules('nama_pariwisata','Nama Pariwisata','required|trim|xss_clean');
            $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim|xss_clean');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|xss_clean');
            $this->form_validation->set_rules('nama_kota','Nama Kota','required|trim|xss_clean');
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            if(isset($_POST['submit'])) {
                if($this->form_validation->run()==FALSE){
                    $this->data['input_data']['prov'] = $this->m_provinsi->AmbilData();
                    $this->data['input_data']['jenis']= $this->m_jenis_pariwisata->AmbilData();
                    $this->template->load('dashboard_user','d_user/pariwisata/input_data',$this->data['input_data']);
                }else{
                    $this->load->library('upload');
                    $this->upload->initialize($this->setup_upload_option());
                    if ($this->upload->do_upload() == false) {
                        $this->data['input_data']['error'] = array('error'=>$this->upload->display_errors());
                        $this->data['input_data']['prov'] = $this->m_provinsi->AmbilData();
                        $this->data['input_data']['jenis']= $this->m_jenis_pariwisata->AmbilData();
                        $this->template->load('dashboard_user','d_user/pariwisata/input_data',$this->data['input_data']);
                    } else {

                        $data = $this->upload->data();
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = $data['full_path'];
                        $config['new_image']    = './uploads/thumbs';
                        $config['overwrite']    = false;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']    = 150;
                        $config['height']   = 150; 
                        $this->load->library('image_lib',$config);
                        $this->image_lib->resize();
                        $nama_img               = $data['orig_name'];
                        $path                   = $data['full_path'];
                        $nama_kota              = $this->input->post('nama_kota');
                        $nama_pariwisata        = $this->input->post('nama_pariwisata');
                        $jenis                  = $this->input->post('jenis');
                        $deskripsi              = $this->input->post('deskripsi');
                        $prov                   = $this->input->post('nama_provinsi');
                        $id_user                = $this->session->userdata('id_user');
                        $rekomen = array(
                            
                            'id_prov'               => $prov,
                            'nama_pariwisata'       => $nama_pariwisata,
                            'id_jenis_pariwisata'   => $jenis,
                            'deskripsi'             => $deskripsi,
                            'id_kota'               => $nama_kota,
                            'id_user'               => $id_user,
                            'status'                => '0',
                            'tanggal'               => gmdate("Y-m-d H:i:s", time()+60*60*7),
                            'nama_img'              => $nama_img,
                            'full_path'             => $path,
                        );
                        $this->m_pariwisata->InputRekomendasi($rekomen);
                        $this->data['input_data']['notif'] = "Success";
                        $this->data['input_data']['prov'] = $this->m_provinsi->AmbilData();
                        $this->data['input_data']['jenis']= $this->m_jenis_pariwisata->AmbilData();
                        $this->template->load('dashboard_user','d_user/pariwisata/input_data',$this->data['input_data']);
                    }
                }
            }else{
                $this->data['input_data']['prov'] = $this->m_provinsi->AmbilData();
                $this->data['input_data']['jenis']= $this->m_jenis_pariwisata->AmbilData();
                $this->template->load('dashboard_user','d_user/pariwisata/input_data',$this->data['input_data']);
            }
        }

        function LihatData(){
           
            $this->data['lihat_data']['record']=$this->m_pariwisata->AmbilData();
            $this->template->load('dashboard_user','d_user/pariwisata/lihat_data',$this->data['lihat_data']);
        }

        function add_kota($id_prov){
            $this->query = $this->db->get_where('kota',array('id_prov'=>$id_prov));
            $this->data = "<option value=''>- Select Kota -</option>";
            foreach ($this->query->result() as $r) {
                $this->data .= "<option value='".$r->id_kota."'>".$r->nm_kota."</option>";
            }
            echo $this->data;
        }

        function InputGambar(){
            
            if (isset($_POST['submit'])) {
                $this->load->library('upload');
                $this->upload->initialize($this->setup_upload_option());
                    if($this->upload->do_upload() == false){
                        
                        $id = $this->uri->segment(4);
                        $this->data['input_gallery']['record'] = $this->m_pariwisata->AmbilDataGambar($id);
                        $this->template->load('dashboard_user','d_user/pariwisata/input_data',$this->data['input_gallery']);

                    }else{
                        $data = $this->upload->data();
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = $data['full_path'];
                        $config['new_image']    = './uploads/thumbs';
                        $config['overwrite']    = false;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']    = 150;
                        $config['height']   = 150; 
                        $this->load->library('image_lib',$config);
                        $this->image_lib->resize();
                        $id   = $this->input->post('id');
                        $dataarray = array(

                            'nama_img'  => $data['orig_name'],
                            'full_path' => $data['full_path'],
                            'id_pariwisata' => $id
                        );
                        $id = $this->input->post('id');
                        $this->m_pariwisata->InputGambar($dataarray);
                        $this->data['input_gallery']['record']=$this->m_pariwisata->AmbilDataGambar($id);
                        $this->data['input_gallery']['gambar'] = $this->m_pariwisata->AmbilGambar($id);
                        $this->template->load('dashboard_user','d_user/pariwisata/input_gallery',$this->data['input_gallery']);
                    }
            }else{
                $id = $this->uri->segment(4);
                $this->data['input_gallery']['gambar'] = $this->m_pariwisata->AmbilGambar($id);
                $this->data['input_gallery']['record'] = $this->m_pariwisata->AmbilDataGambar($id);
                $this->template->load('dashboard_user','d_user/pariwisata/input_gallery',$this->data['input_gallery']);   
            }
        }

        function edit(){

            if (isset($_POST['submit'])) {

                $id = $this->input->post('id');
                $nm_pariwisata = $this->input->post('nama_pariwisata');
                $deskripsi = $this->input->post('deskripsi');

                $data = array(

                    'nm_pariwisata' => $nm_pariwisata,
                    'deskripsi'     => $deskripsi
                );
                $this->m_pariwisata->updateData($data,$id);
                $this->data['lihat_data']['record']=$this->m_pariwisata->AmbilData();
                $this->template->load('dashboard_user','d_user/pariwisata/lihat_data',$this->data['lihat_data']);
            }else{
                
                $id = $this->uri->segment(4);
                $this->data['form_edit']['record'] = $this->m_pariwisata->AmbilDataGambar($id); 
                $this->data['form_edit']['prov'] = $this->m_provinsi->AmbilData();
                $this->data['form_edit']['jenis']= $this->m_jenis_pariwisata->AmbilData();
                $this->template->load('dashboard_user','d_user/pariwisata/form_edit',$this->data['form_edit']);
            }

        }

        function delete(){

            $id = $this->uri->segment(4);
            $delete = $this->m_pariwisata->delete($id);
            $this->data['lihat_data']['record']=$this->m_pariwisata->AmbilData();
            $this->template->load('dashboard_user','d_user/pariwisata/lihat_data',$this->data['lihat_data']);
            
        }

         function deleteGambar(){

            $id = $this->uri->segment(4);
            $delete = $this->m_pariwisata->delete($id);
            $id = $this->input->post('id');
            $this->data['input_gallery']['gambar'] = $this->m_pariwisata->AmbilGambar($id);
            $this->data['input_gallery']['record'] = $this->m_pariwisata->AmbilDataGambar($id);
            $this->template->load('dashboard_user','d_user/pariwisata/input_gallery',$this->data['input_gallery']);
            
        }
        
        function pesan(){
            
            $this->data['lihat_pesan']['record'] = $this->m_user->countPesan($this->id);
            $this->template->load('dashboard_user','d_user/pariwisata/lihat_pesan',$this->data['lihat_pesan']);
            
        }
    }

?>