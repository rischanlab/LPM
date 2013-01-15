<?php
class Admin_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table_name = 'KKN_ANGKATAN';
		$this->table_name_anggota = 'KKN_DETAIL_KELOMPOK';
	}
	
	function getMhsJson($nim)
	{
		$query=$this->db->query("SELECT A.NIM, A.ANGKATAN, A.NAMA,A.TMP_LAHIR, A.TGL_LAHIR, A.NM_KEC, A.TELP_MHS,A.GOL_DARAH, A.BERAT, A.TINGGI,A.PEKERJAAN, A.STATUS_KAWIN, A.ALAMAT_MHS ,A.RT,A.DESA, A.HP_MHS,B.NM_PRODI, C.NM_JURUSAN, D.KD_FAK, D.NM_FAK,  DECODE(A.J_KELAMIN,'L','Laki-laki','P','Perempuan') J_KELAMIN, E.NM_KAB,F.NM_PROP FROM D_MAHASISWA A, MASTER_PRODI B, MASTER_JURUSAN C, MASTER_FAK D, MD_KAB E, MD_PROP F WHERE A.KD_KAB=E.KD_KAB AND A.KD_PRODI = B.KD_PRODI AND B.KD_JURUSAN = C.KD_JURUSAN AND C.KD_FAK = D.KD_FAK AND A.KD_PROP=F.KD_PROP AND A.NIM='$nim'");
		return $query->result();
	}
	
	function getDosenJson()
	{
		 $query=$this->db->query("SELECT KD_DOSEN,NM_DOSEN FROM KKN_DPL");
   
		  return $query->result();
	
	}
	
	function cek_periode_before_insert($periode,$ta){
		$q =$this->db->query("SELECT PERIODE,ID_TA FROM KKN_PERIODE WHERE PERIODE='$periode' AND ID_TA='$ta'");
		return $q;
	}
	/**	function nama_kelompok(){
		 $query=$this->db->query("SELECT ID_KELOMPOK, INITCAP(NAMA_KELOMPOK) NAMA_KELOMPOK FROM KKN_KELOMPOK ORDER BY NAMA_KELOMPOK DESC");
   
		  return $query;
	
		}
		
		 public function get_dropdown() {
		
		$query = $this->db->query("SELECT ID_KELOMPOK,INITCAP(NAMA_KELOMPOK) NAMA_KELOMPOK FROM KKN_KELOMPOK ORDER BY NAMA_KELOMPOK DESC");

			$dropdown = array('' => 'Pilih Nama Kelompok');
				foreach($query->result_array() as $r) {
				$dropdown[$r['ID_KELOMPOK']] = $r['NAMA_KELOMPOK'];
				}
			return $dropdown;
		}
	**/
	function get_peserta_kkn_perkelompok($id_kelompok){
		 $query=$this->db->query("SELECT INITCAP(B.NAMA) NAMA,B.NIM, INITCAP(B.JK) JK, INITCAP(B.FAK) FAK, INITCAP(C.NAMA_KELOMPOK) NAMA_KELOMPOK, C.ID_KELOMPOK,D.ID_DETAIL_KELOMPOK FROM KKN_MHS B, KKN_KELOMPOK C, KKN_DETAIL_KELOMPOK D WHERE C.ID_KELOMPOK=D.ID_KELOMPOK AND B.NO=D.NO AND C.ID_KELOMPOK ='$id_kelompok'");
   
		  return $query;
	
		}
		

	function get_periode() {
		
		$query = $this->db->query("SELECT ID_PERIODE,KD_PERIODE,PERIODE FROM KKN_PERIODE");

			$dropdown = array('' => 'Pilih Periode , Kode Periode');
				foreach($query->result_array() as $r) {
				$dropdown[$r['ID_PERIODE']] = $r['PERIODE']." , ".$r['KD_PERIODE'];
				}
			return $dropdown;
		}
		
		
	function get_dropdown_anggota_kkn() {
		
		$query = $this->db->query("SELECT NO, NIM, INITCAP(JK) JK, INITCAP(FAK) FAK FROM KKN_MHS");

			$dropdown = array('' => 'Mahasiswa Peserta KKN');
				foreach($query->result_array() as $r) {
				$dropdown[$r['NO']] = $r['NIM']." , ".$r['JK']." , ".$r['FAK'];
				}
			return $dropdown;
		}
		
	function get_dropdown_dosen() {
		
		$query = $this->db->query("SELECT KD_DOSEN, INITCAP(NM_DOSEN) NM_DOSEN, INITCAP(ALMT_RUMAH) ALMT_RUMAH FROM KKN_DPL");

			$dropdown = array('' => 'Ketua Panitia KKN');
				foreach($query->result_array() as $r) {
				$dropdown[$r['KD_DOSEN']] = $r['NM_DOSEN'];
				}
			return $dropdown;
		}
		
	function get_angkatan() {
		
		$query = $this->db->query("SELECT ID_ANGKATAN,ANGKATAN FROM KKN_ANGKATAN ORDER BY ANGKATAN DESC");

			$dropdown = array('' => 'Pilih Angkatan');
				foreach($query->result_array() as $r) {
				$dropdown[$r['ID_ANGKATAN']] = $r['ANGKATAN'];
				}
			return $dropdown;
		}
		
		
		function get_anggotakelompok($id_kelompok){

			$query=$this->db->query("
			select B.NIM, INITCAP(B.NAMA) nama, B.PATH_FOTO , INITCAP(B.FAK) fak, C.RW ,INITCAP(C.DESA) desa, INITCAP(D.NM_KEC) nm_kec, INITCAP(E.NM_KAB) nm_kab, INITCAP(F.NM_PROP) nm_prop, G.ANGKATAN,INITCAP(H.NM_DOSEN) nm_dosen,to_char(I.TANGGAL_MULAI, 'dd-mm-yyyy') as mulai, to_char(I.TANGGAL_SELESAI, 'dd-mm-yyyy') as selesai, K.PERIODE, L.TA FROM KKN_MHS B,KKN_KELOMPOK C,MD_KEC D,MD_KAB E,MD_PROP F,KKN_ANGKATAN G,KKN_DPL H,KKN_PERIODE I, KKN_DETAIL_KELOMPOK J, KKN_PERIODE K, KKN_TA L WHERE C.KD_KEC=D.KD_KEC AND C.KD_KAB=E.KD_KAB AND C.KD_PROP=F.KD_PROP AND C.ID_ANGKATAN=G.ID_ANGKATAN AND G.KD_DOSEN=H.KD_DOSEN AND G.ID_PERIODE=I.ID_PERIODE AND J.ID_KELOMPOK=C.ID_KELOMPOK AND B.NO=J.NO AND G.ID_PERIODE=K.ID_PERIODE AND G.ID_TA=L.ID_TA AND j.ID_KELOMPOK=$id_kelompok");
			return $query;

		}
		
		function get_kartu_anggota($id_kelompok){

			$query=$this->db->query("
			select B.NIM, INITCAP(B.NAMA) nama, B.PATH_FOTO , INITCAP(B.FAK) fak, C.RW ,INITCAP(C.DESA) desa, INITCAP(D.NM_KEC) nm_kec, INITCAP(E.NM_KAB) nm_kab, INITCAP(F.NM_PROP) nm_prop, G.ANGKATAN, INITCAP(M.NM_DOSEN) NM_DOSEN, M.PATH_TTD,to_char(K.TANGGAL_MULAI, 'dd-mm-yyyy') as mulai, to_char(K.TANGGAL_SELESAI, 'dd-mm-yyyy') as selesai, K.PERIODE, L.TA FROM KKN_MHS B,KKN_KELOMPOK C,MD_KEC D,MD_KAB E,MD_PROP F,KKN_ANGKATAN G, KKN_DETAIL_KELOMPOK J, KKN_PERIODE K, KKN_TA L, KKN_DPL M WHERE C.KD_KEC=D.KD_KEC AND C.KD_KAB=E.KD_KAB AND C.KD_PROP=F.KD_PROP AND C.ID_ANGKATAN=G.ID_ANGKATAN AND J.ID_KELOMPOK=C.ID_KELOMPOK AND B.NO=J.NO AND G.ID_PERIODE=K.ID_PERIODE AND K.ID_DOSEN=M.ID_DOSEN AND G.ID_TA=L.ID_TA AND j.ID_KELOMPOK=$id_kelompok");
			return $query;

		}

		function get_infokelompok($id_kelompok){
			$query=$this->db->query("select A.NAMA_KELOMPOK NAMA_KELOMPOK, A.RW, INITCAP(A.DESA) DESA, INITCAP(B.NM_KEC) NM_KEC , INITCAP(C.NM_KAB) NM_KAB , INITCAP(D.NM_PROP) NM_PROP FROM KKN_KELOMPOK A, MD_KEC B, MD_KAB C, MD_PROP D WHERE A.KD_KEC=B.KD_KEC AND A.KD_KAB=C.KD_KAB AND A.KD_PROP=D.KD_PROP AND ID_KELOMPOK=$id_kelompok");
			return $query;

		}
		
		function to_csv($ta,$periode,$angkatan){

			$query=$this->db->query("select (C.NAMA_KELOMPOK) Nama_Kelompok_KKN, B.NIM, B.NAMA, B.HP_MHS, B.JK ,B.GOL_DARAH, DECODE(B.STATUS_KAWIN,'B','Belum Kawin','K','Kawin') Status_Perkawinan,B.ALAMAT_RUMAH , (B.FAK) Fakultas, B.ALAMAT_JOGJA, B.RT_JOGJA, B.DESA_JOGJA , (C.RW) Lokasi_RW_KKN ,(C.DESA) Lokasi_Desa_KKN, (D.NM_KEC) Lokasi_Kec_KKN, (E.NM_KAB) Lokasi_Kab_KKN, (F.NM_PROP)Lokasi_prop_KKN, (G.ANGKATAN) Angkatan_KKN ,(H.NM_DOSEN) Nama_DPL,(I.TANGGAL_MULAI) Mulai_KKN, (I.TANGGAL_SELESAI) Selesai_KKN, (K.PERIODE) Periode_KKN, (L.TA) TA_KKN, B.NILAI Nilai_KKN FROM KKN_MHS B,KKN_KELOMPOK C,MD_KEC D,MD_KAB E,MD_PROP F,KKN_ANGKATAN G,KKN_DPL H,KKN_PERIODE I, KKN_DETAIL_KELOMPOK J, KKN_PERIODE K, KKN_TA L WHERE C.KD_KEC=D.KD_KEC AND C.KD_KAB=E.KD_KAB AND C.KD_PROP=F.KD_PROP AND C.ID_ANGKATAN=G.ID_ANGKATAN AND C.ID_DOSEN=H.ID_DOSEN AND G.ID_PERIODE=I.ID_PERIODE AND J.ID_KELOMPOK=C.ID_KELOMPOK AND B.NO=J.NO AND G.ID_PERIODE=K.ID_PERIODE AND G.ID_TA=L.ID_TA AND L.ID_TA =$ta AND K.ID_PERIODE=$periode AND G.ID_ANGKATAN=$angkatan");
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
	
	
	function input_data_anggota_kkn($data) //untuk manambah record
	{
	  	$this->db->insert($this->table_name_anggota, $data);
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
	
	function read_data_peserta() //untuk membaca seluruh record
	{
		$sql = $this->db->get($this->table_name_anggota);
	  	if($sql->num_rows() > 0){			
			foreach($sql->result() as $row){
				$data[] = $row;
			}			
			return $data;
		} else {
			return null;
		}
	}
	
	
	/**
	//iki data nek normal ra nggowo nompo response js
	function get_join_data()
	{
		  $query=$this->db->query("SELECT A.ID_ANGKATAN, A.ANGKATAN, A.SK_SERTIFIKAT, B.PERIODE, C.TA ,INITCAP(D.NM_DOSEN) NM_DOSEN FROM KKN_ANGKATAN A, KKN_PERIODE B, KKN_TA C , KKN_DPL D WHERE B.ID_PERIODE=A.ID_PERIODE AND C.ID_TA=A.ID_TA AND D.KD_DOSEN=A.KD_DOSEN");
   
		  return $query;
	
	
	
	}

	
	function get_data_page($limit, $offset)
	{
		  $query=$this->db->query("SELECT * FROM (SELECT K.*, ROWNUM rnum FROM(SELECT A.ID_ANGKATAN, A.ANGKATAN, A.SK_SERTIFIKAT, B.PERIODE, C.TA ,INITCAP(D.NM_DOSEN) NM_DOSEN FROM KKN_ANGKATAN A, KKN_PERIODE B, KKN_TA C , KKN_DPL D WHERE B.ID_PERIODE=A.ID_PERIODE AND C.ID_TA=A.ID_TA AND D.KD_DOSEN=A.KD_DOSEN ORDER BY A.ANGKATAN ASC) K WHERE ROWNUM <= $limit) WHERE rnum >= $offset");
   
		  return $query;
	
	
	}

	
	**/


	function get_join_data()
	{
		  $query=$this->db->query("SELECT A.ID_ANGKATAN, A.ANGKATAN, A.SK_SERTIFIKAT, B.PERIODE, C.TA ,A.KD_DOSEN FROM KKN_ANGKATAN A, KKN_PERIODE B, KKN_TA C WHERE B.ID_PERIODE=A.ID_PERIODE AND C.ID_TA=A.ID_TA ");
   
		  return $query;
	
	
	
	}

	
	function get_data_page($limit, $offset)
	{
		  
		$sql="SELECT A.ID_ANGKATAN, A.ANGKATAN, A.SK_SERTIFIKAT, B.PERIODE, C.TA ,A.KD_DOSEN FROM KKN_ANGKATAN A, KKN_PERIODE B, KKN_TA C WHERE B.ID_PERIODE=A.ID_PERIODE AND C.ID_TA=A.ID_TA ORDER BY A.ANGKATAN ASC";
		$sql_new = $this->db->_limit($sql,$limit,$offset);
		$query = $this->db->query($sql_new);
		return $query;
		  /**
		  $query=$this->db->query("SELECT * FROM (SELECT K.*, ROWNUM rnum FROM(SELECT A.ID_ANGKATAN, A.ANGKATAN, A.SK_SERTIFIKAT, B.PERIODE, C.TA ,A.KD_DOSEN FROM KKN_ANGKATAN A, KKN_PERIODE B, KKN_TA C WHERE B.ID_PERIODE=A.ID_PERIODE AND C.ID_TA=A.ID_TA ORDER BY A.ANGKATAN ASC) K WHERE ROWNUM <= $limit) WHERE rnum >= $offset");
   
		  return $query;
	
			**/
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
		
	function getKelompokList(){
		$id_angkatan 	= $this->input->post('id_angkatan');
		$result = array();

		$array_keys_values = $this->db->query("SELECT ID_KELOMPOK, NAMA_KELOMPOK FROM KKN_KELOMPOK WHERE ID_ANGKATAN='$id_angkatan' ORDER BY NAMA_KELOMPOK DESC");
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Kelompok-';
            $result[$row->ID_KELOMPOK]= $row->NAMA_KELOMPOK;
        }
        
        return $result;
	}
		


}
