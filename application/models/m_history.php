<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_history extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->table = "aktifitas";
		}

	public function inputAktifitas($laporan){

		$this->db->insert($this->table,$laporan);
	}

	public function ambilData(){

		$query = "	SELECT a.aktifitas, a.tanggal, ad.username 
					FROM aktifitas as a, user as ad 
					WHERE a.id_user = ad.id_user
					ORDER BY a.tanggal DESC";
		return $this->db->query($query);
	}
        
        public function ambilRekomendasi(){
            
            $query =    "SELECT u.username, r.id_rekomendasi, r.nama_pariwisata, u.id_user, r.tanggal
                        FROM rekomendasi as r, user as u
                        WHERE r.id_user = u.id_user and r.status = 0";
            return $this->db->query($query);
        }
        
        public function lihat_rekomendasi($id_user){
            
            $query =    "SELECT r.id_rekomendasi, r.nama_pariwisata, u.id_user, r.id_prov, r.id_kota, r.id_jenis_pariwisata, u.username, jp.nama_jenis, k.nm_kota, p.nm_prov, r.deskripsi, r.tanggal
                        FROM rekomendasi as r, user as u, jenis_pariwisata as jp, kota as k, provinsi as p
                        WHERE r.id_user = u.id_user and r.id_kota = k.id_kota and r.id_prov = p.id_prov and r.id_jenis_pariwisata = jp.id_jenis_pariwisata and r.id_rekomendasi = ".$id_user."";
            return $this->db->query($query);
        }
        
        
        public function updateStatus($data,$id_user){
            
            $this->db->where('id_rekomendasi',$id_user);
            $this->db->update('rekomendasi',$data['update']);
        }
        
        function inputPariwisata($data){
            
            $this->db->insert('pariwisata',$data['kirim']);
        }
        
        function inputPesan($data){
            
            $this->db->insert('pesan',$data['pesan']);
        }

}

/* End of file m_history.php */
/* Location: ./application/models/m_history.php */