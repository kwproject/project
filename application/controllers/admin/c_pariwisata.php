<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	class C_pariwisata extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model(array('m_login','m_pariwisata','m_provinsi','m_kota','m_jenis_pariwisata'));
			if($this->session->userdata('isLogin') != 'berhasil'){
                redirect('login/login_form');
            }   
            $this->user = $this->session->userdata('username');
            $this->data = array(
                    'input_data'    => array(
                        'heading'   => "Input Data Pariwisata",
                        'title'     => "Input Data Pariwisata Indonesia",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login->dataPengguna($this->user),
                        'record'    => '',
                    ),
                    'lihat_data'    => array(
                        'heading'   => "Pariwisata",
                        'title'     => "Data Pariwisata Indonesia",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login->dataPengguna($this->user),
                    ),
                    'form_edit'     => array(
                        
                        'heading'   => "Form Edit Pariwisata",
                        'title'     => "Edit Data Pariwisata Indonesia",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login->dataPengguna($this->user),
                    ),
                    'input_gallery' => array(

                        'heading'   => "Form Gambar Pariwisata",
                        'title'     => "Input Data Gambar Pariwisata",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login->dataPengguna($this->user),
                    ),
            );
		}
		
		function index(){

			if($this->session->userdata('isLogin') != 'berhasil'){
                redirect('login/login_form');
        	}else{
            	$this->data['lihat_data']['record']=$this->m_pariwisata->AmbilData();
                $this->template->load('template','admin/pariwisata/lihat_data',$this->data['lihat_data']);  
        	}
		}

        private function setup_upload_option(){

            $config = array();
            $config['upload_path']      = './uploads';
            $config['allowed_types']    = 'jpg|png|gif';
            $config['overwrite']        = 'False';
            return $config;
        }

		function InputData(){

			$this->form_validation->set_rules('nama_pariwisata','Nama Pariwisata','required|trim|xss_clean');
			$this->form_validation->set_rules('jenis', 'Jenis', 'required|trim|xss_clean');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|xss_clean');
            $this->form_validation->set_rules('nama_kota','Nama Kota','required|trim|xss_clean');
			$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            if(isset($_POST['submit'])) {
                if($this->form_validation->run()==FALSE){
                    $this->data['input_data']['prov'] = $this->m_provinsi->AmbilData();
                    $this->data['input_data']['jenis']= $this->m_jenis_pariwisata->AmbilData();
                    $this->template->load('template','admin/pariwisata/input_data',$this->data['input_data']);
                }else{
                    $nama_kota              = $this->input->post('nama_kota');
                    $nama_pariwisata        = $this->input->post('nama_pariwisata');
                    $jenis                  = $this->input->post('jenis');
                    $deskripsi              = $this->input->post('deskripsi');
                    $prov                   = $this->input->post('nama_provinsi');
                    $input = array(
                        'id_prov'               =>$prov,
                        'nm_pariwisata'         =>$nama_pariwisata,
                        'id_jenis_pariwisata'   =>$jenis,
                        'deskripsi'             =>$deskripsi,
                        'id_kota'               =>$nama_kota
                    );
                    $hasil = $this->m_pariwisata->InputData($input);
                    $this->data['input_data']['notif'] = "Success";
                    $this->data['input_data']['prov'] = $this->m_provinsi->AmbilData();
                    $this->data['input_data']['jenis']= $this->m_jenis_pariwisata->AmbilData();
                    $this->template->load('template','admin/pariwisata/input_data',$this->data['input_data']);
                }

            }else{
                $this->data['input_data']['prov'] = $this->m_provinsi->AmbilData();
                $this->data['input_data']['jenis']= $this->m_jenis_pariwisata->AmbilData();
                $this->template->load('template','admin/pariwisata/input_data',$this->data['input_data']);
            }
		}

        function LihatData(){
           
            $this->data['lihat_data']['record']=$this->m_pariwisata->AmbilData();
            $this->template->load('template','admin/pariwisata/lihat_data',$this->data['lihat_data']);
        }

        function add_kota($id_prov){
            $this->query = $this->db->get_where('kota',array('id_prov'=>$id_prov));
            $this->data = "<option value=''>- Select Kota -</option>";
            foreach ($this->query->result() as $r) {
                $this->data .= "<option value='".$r->id_kota."'>".$r->nm_kota."</option>";
            }
            echo $this->data;
        }

        //not solved
        function InputGambar(){
            
            if (isset($_POST['submit'])) {
                $this->load->library('upload');
                $this->upload->initialize($this->setup_upload_option());
                    if($this->upload->do_upload() == false){
                        
                        $id = $this->uri->segment(4);
                        $this->data['input_gallery']['record'] = $this->m_pariwisata->AmbilDataGambar($id);
                        $this->template->load('template','admin/pariwisata/input_data',$this->data['input_gallery']);

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
                        $this->template->load('template','admin/pariwisata/input_gallery',$this->data['input_gallery']);
                    }
            }else{
                $id = $this->uri->segment(4);
                $this->data['input_gallery']['gambar'] = $this->m_pariwisata->AmbilGambar($id);
                $this->data['input_gallery']['record'] = $this->m_pariwisata->AmbilDataGambar($id);
                $this->template->load('template','admin/pariwisata/input_gallery',$this->data['input_gallery']);   
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
                $this->template->load('template','admin/pariwisata/lihat_data',$this->data['lihat_data']);
            }else{
                
                $id = $this->uri->segment(4);
                $this->data['form_edit']['record'] = $this->m_pariwisata->AmbilDataGambar($id); 
                $this->data['form_edit']['prov'] = $this->m_provinsi->AmbilData();
                $this->data['form_edit']['jenis']= $this->m_jenis_pariwisata->AmbilData();
                $this->template->load('template','admin/pariwisata/form_edit',$this->data['form_edit']);
            }

        }

        function delete(){

            $id = $this->uri->segment(4);
            $delete = $this->m_pariwisata->delete($id);
            $this->data['lihat_data']['record']=$this->m_pariwisata->AmbilData();
            $this->template->load('template','admin/pariwisata/lihat_data',$this->data['lihat_data']);
            
        }

         function deleteGambar(){

            $id = $this->uri->segment(4);
            $delete = $this->m_pariwisata->delete($id);
            $id = $this->input->post('id');
            $this->data['input_gallery']['gambar'] = $this->m_pariwisata->AmbilGambar($id);
            $this->data['input_gallery']['record'] = $this->m_pariwisata->AmbilDataGambar($id);
            $this->template->load('template','admin/pariwisata/input_gallery',$this->data['input_gallery']);
            
        }




	}

?>