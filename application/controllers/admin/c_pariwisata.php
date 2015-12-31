<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	class C_pariwisata extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model(array('m_history','m_login','m_pariwisata','m_provinsi','m_kota','m_jenis_pariwisata'));
            if($this->session->userdata('level') == 0){
                redirect('user/home');
            }elseif ($this->session->userdata('Login')!='berhasil') {
                redirect('login');  
            } 
            $this->user = $this->session->userdata('username');
            $this->data = array(
                    'input_data'    => array(
                        'heading'   => "Input Data Pariwisata",
                        'title'     => "Input Data Pariwisata Indonesia",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login->data($this->user),
                        'record'    => '',
                    ),
                    'lihat_data'    => array(
                        'heading'   => "Pariwisata",
                        'title'     => "Data Pariwisata Indonesia",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login->data($this->user),
                    ),
                    'form_edit'     => array(
                        
                        'heading'   => "Form Edit Pariwisata",
                        'title'     => "Edit Data Pariwisata Indonesia",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login->data($this->user),
                    ),
                    'input_gallery' => array(

                        'heading'   => "Form Gambar Pariwisata",
                        'title'     => "Input Data Gambar Pariwisata",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login->data($this->user),
                    ),
            );
		}
		
		function index(){

			if($this->session->userdata('Login') != 'berhasil'){
                redirect('login');
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

            $this->form_validation->set_rules('nama_provinsi','Nama Provinsi','required|trim|xss_clean');
			$this->form_validation->set_rules('nama_pariwisata','Nama Pariwisata','required|trim|xss_clean');
			$this->form_validation->set_rules('jenis', 'Jenis', 'required|trim|xss_clean');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim|xss_clean');
            $this->form_validation->set_rules('nama_kota','Nama Kota','required|trim|xss_clean');
            $this->form_validation->set_rules('lat','latitude lokasi','required|trim|xss_clean');
            $this->form_validation->set_rules('lng','longitude lokasi','required|trim|xss_clean');
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
                    $lat                    = $this->input->post('lat');
                    $lng                    = $this->input->post('lng');
                    $input = array(
                        'id_prov'               =>$prov,
                        'nm_pariwisata'         =>$nama_pariwisata,
                        'id_jenis_pariwisata'   =>$jenis,
                        'deskripsi'             =>$deskripsi,
                        'id_kota'               =>$nama_kota,
                        'lat'                   =>$lat,
                        'lng'                   =>$lng
                    );
                    $id      = $this->session->userdata('id_user');
                    $date    = gmdate("Y-m-d H:i:s", time()+60*60*7);
                    $laporan = array(

                        'id_user'       => $id,
                        'aktifitas'     => 'Telah melakukan Input data pada Pariwisata '.$nama_pariwisata.'',
                        'tanggal'       => $date,

                    );
                    $this->m_history->inputAktifitas($laporan);
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

                            'nama_img'          => $data['orig_name'],
                            'full_path'         => $data['full_path'],
                            'id_pariwisata'     => $id
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

                $id             = $this->input->post('id');
                $nm_pariwisata  = $this->input->post('nama_pariwisata');
                $deskripsi      = $this->input->post('deskripsi');
                $lat            = $this->input->post('lat');
                $lng            = $this->input->post('lng');

                $data = array(

                    'nm_pariwisata' => $nm_pariwisata,
                    'deskripsi'     => $deskripsi,
                    'lat'           => $lat,
                    'lng'           => $lng
                );
                $id_user = $this->session->userdata('id_user');
                $date    = gmdate("Y-m-d H:i:s", time()+60*60*7);
                $laporan = array(

                    'id_user'       => $id_user,
                    'aktifitas'     => 'Telah melakukan Update pada Pariwisata '.$nm_pariwisata.'',
                    'tanggal'       => $date,

                );
                $this->m_history->inputAktifitas($laporan);
                $this->m_pariwisata->updateData($data,$id);
                echo "<script>
                        alert('berhasil update data')
                    </script>";
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
            $hasil = $this->m_pariwisata->getOne($id);
            foreach ($hasil->result() as $h) {
                $nm_pariwisata = $h->nm_pariwisata;
            }
            $id1     = $this->session->userdata('id_user');
            $date    = gmdate("Y-m-d H:i:s", time()+60*60*7);
            $laporan = array(

                'id_user'            => $id1,
                'aktifitas'     => 'Telah melakukan Delete pada Pariwisata '.$nm_pariwisata.'',
                'tanggal'       => $date,

            );
            $this->m_history->inputAktifitas($laporan);
            $delete = $this->m_pariwisata->delete($id);
            echo "<script>alert('berhasil menghapus data')</script>";
            $this->data['lihat_data']['record']=$this->m_pariwisata->AmbilData();
            $this->template->load('template','admin/pariwisata/lihat_data',$this->data['lihat_data']);
            
        }

         function deleteGambar(){

            $id_gambar = $this->uri->segment(4);
            $this->m_pariwisata->deleteGambar($id_gambar);
            echo '  <script>
                        alert("berhasil menghapus gambar")
                    </script>';
            $this->index();
         }
	}