<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model(array('m_login','m_berita','m_provinsi','m_user'));
        $this->load->database();
        $this->user = $this->session->userdata('username');
        $this->data = array(
            'index' => array(
                'title'     => 'Pariwisata Indonesia',
                'pengguna'  => $this->m_login->data($this->user),
            ),
        );
    }

    function index(){
        
        $this->data['index']['berita'] =  $this->berita();
        $this->template->load('template_user','user/index', $this->data['index']);
    }
    
    function berita(){
        return $this->m_berita->ambilBerita();
    }
    
    function provinsi(){
        $data['prov'] = $this->m_user->getProvinsi();
        $this->load->view('user/pariwisata',$data);
    }
    function kota(){

        $id_prov    = $this->input->post('provinsi_id');
        $kota       = $this->m_user->getKota($id_prov);
        $data = "<option value=''>---Pilih Kota---</option>";
        foreach ($kota as $k) {
             $data .= "<option value='$k[id_kota]'>$k[nm_kota]</option>";
        }
        echo $data;
    }
}