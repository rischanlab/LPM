<?php
class Dosen_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();

	}

	public function get_dropdown($id_dosen) {
		$table = 'KKN_KELOMPOK';
		$kd_dosen =$id_dosen;
	
		$query = $this->db->query("SELECT ID_KELOMPOK,NAMA_KELOMPOK FROM KKN_KELOMPOK WHERE KD_DOSEN='$id_dosen'");

		//$dropdown = array();
		$dropdown = array('' => 'Pilih Nama Kelompok');
		foreach($query->result_array() as $r) {
			$dropdown[$r['ID_KELOMPOK']] = $r['NAMA_KELOMPOK'];
		}
		return $dropdown;
	}
	
	function cek_dosen_membina($id_dosen){
		$query=$this->db->query("SELECT ID_KELOMPOK,NAMA_KELOMPOK FROM KKN_KELOMPOK WHERE KD_DOSEN='$id_dosen'");
		return $query;

	}

	function get_anggotakelompok($id_kelompok){

		$query=$this->db->query("SELECT A.NIM, A.FAK, C.NAMA , C.HP_MHS  FROM KKN_DETAIL_KELOMPOK B, KKN_MHS A, D_MAHASISWA C WHERE B.NO=A.NO AND A.NIM=C.NIM AND B.ID_KELOMPOK=$id_kelompok");
		return $query;

	}

	function get_infokelompok($id_kelompok){
		$query=$this->db->query("select A.NAMA_KELOMPOK, A.RW, A.DESA, B.NM_KEC , C.NM_KAB , D.NM_PROP FROM KKN_KELOMPOK A, MD_KEC B, MD_KAB C, MD_PROP D WHERE A.KD_KEC=B.KD_KEC AND A.KD_KAB=C.KD_KAB AND A.KD_PROP=D.KD_PROP AND ID_KELOMPOK=$id_kelompok");
		return $query;

	}
	
	function getKelompokList($id_dosen){
		$id_angkatan 	= $this->input->post('id_angkatan');
	
		$result = array();

		$array_keys_values = $this->db->query("SELECT ID_KELOMPOK, NAMA_KELOMPOK FROM KKN_KELOMPOK WHERE ID_ANGKATAN='$id_angkatan' AND KD_DOSEN='$id_dosen' ORDER BY NAMA_KELOMPOK ASC");
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Kelompok-';
            $result[$row->ID_KELOMPOK]= $row->NAMA_KELOMPOK;
        }
        
        return $result;
	}
		


}
