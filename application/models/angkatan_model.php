<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Angkatan_model extends CI_Model {
	private $table_name; 
	
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'KKN_ANGKATAN'; //setting nama tabel
	}
	
	
	function nama_kelompok(){
		 $query=$this->db->query("SELECT ID_KELOMPOK, NAMA_KELOMPOK FROM KKN_KELOMPOK");
   
		  return $query;
	
	
	
	}
	
	
	function get_peserta_kkn_perkelompok($id_kelompok){
		 $query=$this->db->query("SELECT A.NAMA,A.NIM, B.JK, B.FAK, C.NAMA_KELOMPOK FROM D_MAHASISWA A, KKN_MHS B, KKN_KELOMPOK C, KKN_DETAIL_KELOMPOK D WHERE B.NIM=A.NIM AND C.ID_KELOMPOK=D.ID_KELOMPOK AND B.NO=D.NO AND C.ID_KELOMPOK ='$id_kelompok'");
   
		  return $query;
	
	
	
	}

	function create_data($data) //untuk manambah record
	{
	  	$this->db->insert($this->table_name, $data);
	  	if($this->db->affected_rows() > 0){
			return true;
		} else{
			return false;
		}
	}
	
	function read_data() //untuk membaca seluruh record
	{
		$sql = $this->db->get($this->table_name);
	  	if($sql->num_rows() > 0){			
			foreach($sql->result() as $row){
				$data[] = $row;
			}			
			return $data;
		} else {
			return null;
		}
	}
	
	function get_join_data()
	{
		  $query=$this->db->query("SELECT A.ID_ANGKATAN, A.ANGKATAN, B.PERIODE, C.TA ,D.NM_DOSEN FROM KKN_ANGKATAN A, KKN_PERIODE B, KKN_TA C , D_DOSEN D WHERE B.ID_PERIODE=A.ID_PERIODE AND C.ID_TA=A.ID_TA AND D.KD_DOSEN=A.KD_DOSEN");
   
		  return $query;
	
	
	
	}
	
	
	
	function get_data_page($limit, $offset)
	{
		  $query=$this->db->query("SELECT * FROM (SELECT K.*, ROWNUM rnum FROM(SELECT A.ID_ANGKATAN, A.ANGKATAN, B.PERIODE, C.TA ,D.NM_DOSEN FROM KKN_ANGKATAN A, KKN_PERIODE B, KKN_TA C , D_DOSEN D WHERE B.ID_PERIODE=A.ID_PERIODE AND C.ID_TA=A.ID_TA AND D.KD_DOSEN=A.KD_DOSEN ORDER BY A.ANGKATAN) K WHERE ROWNUM <= $limit) WHERE rnum >= $offset");
   
		  return $query;
	
	
	}
	
	
	
	function update_data($kode,$data) //untuk meng-update record 
	{
	  	$this->db->where('ID_ANGKATAN', $kode);
	  	$this->db->update($this->table_name, $data);
	  	if($this->db->affected_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
	
	function delete_data($kode) //untuk mengambil record berdasarkan kodenya
	{
	  	$this->db->where('ID_ANGKATAN', $kode);
	  	$this->db->delete($this->table_name);
		if($this->db->affected_rows() > 0){
			return true;
		}
		else{
			return false;
		}	  	
	}
	
	function get_data($kode)
	{
		$this->db->where('ID_ANGKATAN', $kode);
		$query = $this->db->get($this->table_name);
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return null;
		}
	}	
	
	function getTaList(){
		$result = array();
		$this->db->select('*');
		$this->db->from('KKN_TA');
		$this->db->order_by('TA','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Ta-';
            $result[$row->ID_TA]= $row->TA;
        }
        
        return $result;
	}

	function getPeriodeList(){
		$id_ta = $this->input->post('id_ta');
		$result = array();
		$this->db->select('*');
		$this->db->from('KKN_PERIODE');
		$this->db->where('ID_TA',$id_ta);
		$this->db->order_by('PERIODE','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Periode-';
            $result[$row->ID_PERIODE]= $row->PERIODE;
        }
        
        return $result;
	}
	
	
	function getAngkatanList(){
		$id_ta = $this->input->post('id_ta');
		$result = array();
		$this->db->select('*');
		$this->db->from('KKN_ANGKATAN');
		$this->db->where('ID_TA',$id_ta);
		$this->db->order_by('ANGKATAN','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Angkatan-';
            $result[$row->ID_ANGKATAN]= $row->ANGKATAN;
        }
        
        return $result;
	}
	
	public function get_dropdown_dosen() {
		
		$query = $this->db->query("SELECT KD_DOSEN, NM_DOSEN, ALMT_RUMAH FROM D_DOSEN");

			$dropdown = array('' => 'Ketua Panitia KKN');
				foreach($query->result_array() as $r) {
				$dropdown[$r['KD_DOSEN']] = $r['NM_DOSEN'];
				}
			return $dropdown;
		}
		
		 public function get_angkatan() {
		
		$query = $this->db->query("SELECT ID_ANGKATAN,ANGKATAN FROM KKN_ANGKATAN");

			$dropdown = array('' => 'Pilih Angkatan');
				foreach($query->result_array() as $r) {
				$dropdown[$r['ID_ANGKATAN']] = $r['ANGKATAN'];
				}
			return $dropdown;
		}
		
		
		 public function get_nama_kelompok() {
		
		$query = $this->db->query("SELECT ID_KELOMPOK,NAMA_KELOMPOK FROM KKN_KELOMPOK");

			$dropdown = array('' => 'Pilih Kelompok');
				foreach($query->result_array() as $r) {
				$dropdown[$r['ID_KELOMPOK']] = $r['NAMA_KELOMPOK'];
				}
			return $dropdown;
		}

	
}