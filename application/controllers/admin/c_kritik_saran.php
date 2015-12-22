<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class C_kritik_saran extends CI_Controller{

		function __construct(){
			parent::__construct();
	        $this->load->model(array('m_kritik_saran','m_login','m_contact','m_history'));
	        $this->load->database();
            if($this->session->userdata('level') == 0){
                redirect('user/home');
            }elseif ($this->session->userdata('Login')!='berhasil') {
                redirect('login');  
            } 
            $this->id   = $this->session->userdata('id_user');
            $this->user = $this->session->userdata('username');
            $this->data = array(
    
                    'lihat_data'   => array(
                        
                        'heading1'  => "Data Kritik Saran dan Contact",
                        'heading2'  => "Data Kritik dan Saran",
                        'heading3'  => "Data Contact",
                        'title'     => "Data Kritik Saran dan Contact",
                        'level'     => $this->session->userdata('level'),
                        'pengguna'  => $this->m_login->data($this->user)
                    ),
            );
		}
        public function index(){
            $this->data['lihat_data']['kritik']=$this->m_kritik_saran->AmbilData();
            $this->data['lihat_data']['contact']=$this->m_contact->AmbilDataContact();
            $this->template->load('template','admin/kritik_saran/lihat_data',$this->data['lihat_data']);
        }

        public function deleteKritik(){

            $id = $this->uri->segment(4);
            $delete = $this->m_kritik_saran->delete($id);
            
            if ($delete==TRUE) {
                $id      = $this->session->userdata('id_user');
                $date    = gmdate("Y-m-d H:i:s", time()+60*60*7);
                $laporan = array(

                    'id_user'       => $id,
                    'aktifitas'     => 'Telah menghapus Kritik',
                    'tanggal'       => $date,

                );
                $this->m_history->inputAktifitas($laporan);
                echo "<script>
                        alert('Berhasil Delete')
                        history.go(-1)
                    </script>";
            } else {
                echo "<script>
                        alert('Gagal Delete')
                        history.go(-1)
                    </script>";
            }
            
        }

        public function deleteKontak(){

            $id_contact = $this->uri->segment(4);
            $delete = $this->m_contact->delete($id_contact);
             
            if ($delete==TRUE) {
                $id      = $this->session->userdata('id_user');
                $date    = gmdate("Y-m-d H:i:s", time()+60*60*7);
                $laporan = array(

                    'id_user'       => $id,
                    'aktifitas'     => 'Telah menghapus kontak',
                    'tanggal'       => $date,

                );
                $this->m_history->inputAktifitas($laporan);
               echo "<script>
                        alert('Berhasil Delete')
                        history.go(-1)
                    </script>";
            } else {
                echo "<script>
                        alert('gagal Delete')
                        history.go(-1)
                    </script>";
            }
        }
    }