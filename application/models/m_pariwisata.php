<?php  if(! defined('BASEPATH')) exit('No direct script access allowed');

	class M_pariwisata extends CI_Model{

		public $table = 'pariwisata';
    	public function __construct() {
        parent::__construct();
    	}

        function InputData($input){
        	$query = $this->db->insert($this->table,$input);
        	if($query){
        		return TRUE;
        	}else{
        		return FALSE;
        	}
        }

        function AmbilData(){
        	$query = 	"SELECT pariwisata.id_pariwisata, pariwisata.nm_pariwisata, pariwisata.deskripsi, jenis_pariwisata.nama_jenis, provinsi.nm_prov, kota.nm_kota
						FROM `pariwisata`
						JOIN jenis_pariwisata ON pariwisata.id_jenis_pariwisata = jenis_pariwisata.id_jenis_pariwisata
						JOIN provinsi ON pariwisata.id_prov = provinsi.id_prov
						JOIN kota ON pariwisata.id_kota = kota.id_kota";
			return $this->db->query($query);
        }

        function getOne($data){

        	$this->db->select('*');
	        $this->db->from($this->table);
	        $this->db->where($data);
	        $query = $this->db->get();
	        return $query;
        }

        function updateData($data,$id){
        	$query = $this->db->update($this->table,$data,array('id_pariwisata'=>$id));
	        if($query){
	            return TRUE;
	        }else{
	            return FALSE;
	        }
        }

        function deleteData($data){
        	
        	$query = $this->db->delete($this->table,$data);
	        if($query){
	            
	            return TRUE;
	            
	        }else{
	            
	            return FALSE;
	        }
        }

        function AmbilDataGambar($id){

        	$query = 	"SELECT pariwisata.id_pariwisata, pariwisata.nm_pariwisata, pariwisata.deskripsi, jenis_pariwisata.nama_jenis, provinsi.nm_prov, kota.nm_kota, jenis_pariwisata.id_jenis_pariwisata
						FROM `pariwisata`
						JOIN jenis_pariwisata ON pariwisata.id_jenis_pariwisata = jenis_pariwisata.id_jenis_pariwisata
						JOIN provinsi ON pariwisata.id_prov = provinsi.id_prov
						JOIN kota ON pariwisata.id_kota = kota.id_kota
						where id_pariwisata = '$id'";
			return $this->db->query($query);
        }

        function InputGambar($dataarray){

	      	$query = $this->db->insert('image', $dataarray);
	      	if($query){

	      		return TRUE;
	      	} else {
	      		return False;
	      	}
        }
        function AmbilGambar($id){

        	$query = "	SELECT nama_img, id_img
						FROM `image` 
						WHERE id_pariwisata = '$id'";
        	return $this->db->query($query);
        }

        function delete($id){

        	$this->db->where('id_pariwisata',$id);
            $this->db->delete('pariwisata');
        }

        function deleteGambar($id){

        	$this->db->where('id_img',$id);
            $this->db->delete('image');
        }
	}
