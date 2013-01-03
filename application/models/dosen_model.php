<?php
class Dosen_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();

	}

	function cek_dosen_membina($id_dosen){
		$query=$this->db->query("SELECT A.ID_KELOMPOK,A.NAMA_KELOMPOK FROM KKN_KELOMPOK A, KKN_DPL B WHERE B.KD_DOSEN='$id_dosen'");
		return $query;

	}

	function get_anggotakelompok($id_kelompok){

		$query=$this->db->query("SELECT A.NIM, INITCAP(A.FAK) FAK, INITCAP(A.NAMA) NAMA , A.HP_MHS, A.NILAI  FROM KKN_DETAIL_KELOMPOK B, KKN_MHS A WHERE B.NO=A.NO AND B.ID_KELOMPOK=$id_kelompok");
		return $query;

	}

	function get_infokelompok($id_kelompok){
		$query=$this->db->query("select A.NAMA_KELOMPOK, A.RW, INITCAP(A.DESA) DESA, INITCAP(B.NM_KEC) NM_KEC , INITCAP(C.NM_KAB) NM_KAB , INITCAP(D.NM_PROP) NM_PROP FROM KKN_KELOMPOK A, MD_KEC B, MD_KAB C, MD_PROP D WHERE A.KD_KEC=B.KD_KEC AND A.KD_KAB=C.KD_KAB AND A.KD_PROP=D.KD_PROP AND A.ID_KELOMPOK=$id_kelompok");
		return $query;

	}
	
	function getTaList(){
		$result = array();
		$this->db->select('*');
		$this->db->from('KKN_TA');
		$this->db->order_by('TA','DESC');
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
		$this->db->order_by('ANGKATAN','DESC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Angkatan-';
            $result[$row->ID_ANGKATAN]= $row->ANGKATAN;
        }
        
        return $result;
	}
	
	function getKelompokList($id_dosen){
		
		$id_angkatan 	= $this->input->post('id_angkatan');
	
		$result = array();

		$array_keys_values = $this->db->query("SELECT A.ID_KELOMPOK, A.NAMA_KELOMPOK FROM KKN_KELOMPOK A,KKN_DPL B WHERE  A.ID_DOSEN=B.ID_DOSEN AND A.ID_ANGKATAN='$id_angkatan' AND B.KD_DOSEN='$id_dosen' ORDER BY A.NAMA_KELOMPOK DESC");
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Kelompok-';
            $result[$row->ID_KELOMPOK]= $row->NAMA_KELOMPOK;
        }
        
        return $result;
	}
	  
	    public function getById( $id ) {
		$id = intval( $id );
		
		$query = $this->db->where( 'NO', $id )->get( 'KKN_MHS' );
		
		if( $query->num_rows() > 0 ) {
		    return $query->row();
		} else {
		    return array();
		}
	    }
	    
	    public function getAll($id_kelompok) {
		//$id_kelompok=95;
		$query = $this->db->query( "SELECT A.NIM, A.NAMA, A.FAK, A.HP_MHS, A.NILAI, B.NO FROM KKN_MHS A, KKN_DETAIL_KELOMPOK B WHERE A.NO =B.NO AND B.ID_KELOMPOK='$id_kelompok'" );
		
		if( $query->num_rows() > 0 ) {
		    return $query->result();
		} else {
		    return array();
		}
	    } 
	    
	    public function update() {
		$data = array(
		    'NIM' => $this->input->post( 'nim', true ),
		    'NAMA' => $this->input->post( 'nama', true ),
		    'NILAI' => $this->input->post( 'nilai', true )
		);
		
		$this->db->update( 'KKN_MHS', $data, array( 'NO' => $this->input->post( 'id', true ) ) );
	    }
		
	/**
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
	**/	


}
