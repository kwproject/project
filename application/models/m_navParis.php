<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_navParis extends CI_Model {

	public function getKota($id){
        $this->db->select('*');
        $this->db->from('kota');
        $this->db->where('id_prov',$id);
        $this->db->order_by('nm_kota','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function getPariwisata(){
        $id = $this->input->post('kota');
        $query = "	SELECT DISTINCT p.id_pariwisata, p.nm_pariwisata,p.deskripsi,i.nama_img,pr.nm_prov,k.nm_kota
					FROM pariwisata as p
                    INNER JOIN provinsi as pr ON p.id_prov = pr.id_prov
                    INNER JOIN kota as k ON p.id_kota = k.id_kota
                    INNER JOIN jenis_pariwisata as jp ON p.id_jenis_pariwisata = jp.id_jenis_pariwisata
					LEFT JOIN image as i ON p.id_pariwisata = i.id_pariwisata
					WHERE p.id_kota = $id";
		$result = $this->db->query($query);
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return Null;
		}
    }
     public function getPariwisataAll(){
        $query = "	SELECT DISTINCT p.id_pariwisata, p.nm_pariwisata,p.deskripsi,i.nama_img,pr.nm_prov,k.nm_kota
					FROM pariwisata as p
                    INNER JOIN provinsi as pr ON p.id_prov = pr.id_prov
                    INNER JOIN kota as k ON p.id_kota = k.id_kota
					LEFT JOIN image as i ON p.id_pariwisata = i.id_pariwisata";
		$result = $this->db->query($query);
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return Null;
		}
    }

    public function getdata(){
        $id = $this->uri->segment(4);
        $query = "	SELECT DISTINCT p.id_pariwisata, p.nm_pariwisata,p.deskripsi,i.nama_img,pr.nm_prov,k.nm_kota,jp.id_jenis_pariwisata
					FROM pariwisata as p
                    INNER JOIN provinsi as pr ON p.id_prov = pr.id_prov
                    INNER JOIN kota as k ON p.id_kota = k.id_kota
                    INNER JOIN jenis_pariwisata as jp ON p.id_jenis_pariwisata = jp.id_jenis_pariwisata
					LEFT JOIN image as i ON p.id_pariwisata = i.id_pariwisata
					WHERE md5(p.id_pariwisata) = '$id'";
		$result = $this->db->query($query);
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return Null;
		}
    }
    public function getImage(){
    	$id = $this->uri->segment(4);
    	$query = "SELECT nama_img FROM `image` WHERE md5(id_pariwisata) = '$id'";
    	$result = $this->db->query($query);
    	if($result->num_rows() > 0){

    		return $result->result();
    	} else {
    		return null;
    	}
    }

    public function getSuggest($id,$id_par){
        $query = " SELECT DISTINCT p.id_pariwisata, p.nm_pariwisata,p.deskripsi,i.nama_img,pr.nm_prov,k.nm_kota,jp.id_jenis_pariwisata
                    FROM pariwisata as p
                    INNER JOIN provinsi as pr ON p.id_prov = pr.id_prov
                    INNER JOIN kota as k ON p.id_kota = k.id_kota
                    INNER JOIN jenis_pariwisata as jp ON p.id_jenis_pariwisata = jp.id_jenis_pariwisata
                    LEFT JOIN image as i ON p.id_pariwisata = i.id_pariwisata
                    WHERE p.id_jenis_pariwisata = $id and md5(p.id_pariwisata) != '$id_par'";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return null;
        }
    }

}

/* End of file m_navParis.php */
/* Location: ./application/models/m_navParis.php */