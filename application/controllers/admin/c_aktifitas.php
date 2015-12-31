<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_aktifitas extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_login','m_history'));
		if($this->session->userdata('level') == 0){
            redirect('user/home');
        }elseif ($this->session->userdata('Login')!='berhasil') {
            redirect('login');  
        } 
		$this->user 	= $this->session->userdata('username');
		$this->id_user	= $this->session->userdata('id_user');

		$this->data = array(

			'lihat_aktifitas'	=> array(
                'heading1'		=> 'Aktifitas',
                'heading2'		=> 'Rekomendasi User',
                'heading3'		=> 'Aktifitas Admin',
                'title'		    => 'History',
                'pengguna'		=> $this->m_login->data($this->user),
			),
            'lihat_rekomendasi'	=> array(
                'heading'	=> 'Rekomedasi',
                'title'		=> 'Rekomedasi',
                'pengguna'	=> $this->m_login->data($this->user),
            ),
		);
	}
        
        
	public function index()
	{       
            $this->data['lihat_aktifitas']['rekomendasi']   = $this->m_history->ambilRekomendasi();
            $this->data['lihat_aktifitas']['aktifitas']     = $this->m_history->ambilData();
            $this->template->load('template','admin/history/lihat_aktifitas',$this->data['lihat_aktifitas']);
	}
        
        public function eksekusi(){
            if(isset($_POST['terima'])){
                $id_user         = $this->input->post('id_user');
                $username        = $this->input->post('username');
                $kota            = $this->input->post('id_kota');  
                $provinsi        = $this->input->post('id_prov');  
                $jenis           = $this->input->post('id_jenis'); 
                $nama_pariwisata = $this->input->post('nama_paris');
                $deskripsi       = $this->input->post('deskripsi');
                $id              = $this->input->post('id');
                $nama_img        = $this->input->post('nama_img');
                $full_path       = $this->input->post('full_path');
                $data = array(
                    'update'        => array(
                        'status'    => '1'
                    ),
                    'kirim'         => array(
                        'nm_pariwisata'         => $nama_pariwisata,
                        'deskripsi'             => $deskripsi,
                        'id_kota'               => $kota,
                        'id_jenis_pariwisata'   => $jenis,
                        'id_prov'               => $provinsi
                    ),
                    'pesan'         => array(
                       'id_user'    => $id_user,
                       'isi_pesan' => 'Rekomendasi anda yang bernama '.$nama_pariwisata.' sudah kami terima, Terima Kasih atas kerjasamanya ', 
                    ),
                );
                $laporan = array(
                        'id_user'       => $this->session->userdata('id_user'),
                        'aktifitas'     => 'Telah melakukan proses penerimaan rekomendasi dari '.$username.'dengan pariwisata '.$nama_pariwisata.'',
                        'tanggal'       => gmdate("Y-m-d H:i:s", time()+60*60*7),
                );
                $this->m_history->updateStatus($data,$id);
                $this->m_history->inputAktifitas($laporan);
                $this->m_history->inputPariwisata($data);
                $this->m_history->inputPesan($data);
                $hasil = $this->m_history->cariIdPariwisata($nama_pariwisata);
                foreach($hasil as $h){
                    $id_pariwisata = $h->id_pariwisata;
                }
                $image = array(
                    'id_pariwisata' => $id_pariwisata,
                    'full_path'     => $full_path,
                    'nama_img'      => $nama_img
                );
                $this->m_history->inputImage($image);
                echo "  <script>
                            alert('Berhasil Menerima')
                        </script>";
                $this->index();
                
            }  elseif (isset($_POST['tolak'])) {
                $id              = $this->input->post('id');
                $id_user         = $this->input->post('id_user');
                $username        = $this->input->post('username');
                $nama_pariwisata = $this->input->post('nama_paris');
                $data = array(
                    'update'        => array(
                        'status'    => '2'
                    ),
                    'pesan'         => array(
                       'id_user'    => $id_user,
                       'isi_pesan' => 'Rekomendasi anda yang bernama '.$nama_pariwisata.' kami tidak terima, Terima Kasih atas kerjasamanya ', 
                    ),  
                );
                $laporan = array(
                    'id_user'       => $this->session->userdata('id_user'),
                    'aktifitas'     => 'Telah melakukan proses penolakan rekomendasi dari '.$username.'dengan pariwisata '.$nama_pariwisata.'',
                    'tanggal'       => gmdate("Y-m-d H:i:s", time()+60*60*7),
                );
                $this->m_history->updateStatus($data,$id);
                $this->m_history->inputAktifitas($laporan);
                $this->m_history->inputPesan($data);
                echo "  <script>
                            alert('Berhasil Menolak')
                        </script>";
                $this->index();
                    
            }else{
                $this->index();
            }
        }
        
        public function lihat_rekomendasi(){
            
            $id = $this->uri->segment(4);
            $hasil = $this->m_history->lihat_rekomendasi($id);
            $this->data['lihat_rekomendasi']['record'] = $hasil;
            $this->template->load('template','admin/history/lihat_rekomendasi',$this->data['lihat_rekomendasi']);
        }
}

/* End of file c_report.php */
/* Location: ./application/controllers/admin/c_report.php */