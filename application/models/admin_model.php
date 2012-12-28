<?php
class Admin_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table_name = 'KKN_ANGKATAN';
		$this->table_name_anggota = 'KKN_DETAIL_KELOMPOK';
	}
	
		function nama_kelompok(){
		 $query=$this->db->query("SELECT ID_KELOMPOK, NAMA_KELOMPOK FROM KKN_KELOMPOK ORDER BY NAMA_KELOMPOK ASC");
   
		  return $query;
	
		}
	
	function get_peserta_kkn_perkelompok($id_kelompok){
		 $query=$this->db->query("SELECT A.NAMA,A.NIM, B.JK, B.FAK, C.NAMA_KELOMPOK, C.ID_KELOMPOK,D.ID_DETAIL_KELOMPOK FROM D_MAHASISWA A, KKN_MHS B, KKN_KELOMPOK C, KKN_DETAIL_KELOMPOK D WHERE B.NIM=A.NIM AND C.ID_KELOMPOK=D.ID_KELOMPOK AND B.NO=D.NO AND C.ID_KELOMPOK ='$id_kelompok'");
   
		  return $query;
	
		}
		 public function get_dropdown() {
		
		$query = $this->db->query("SELECT ID_KELOMPOK,NAMA_KELOMPOK FROM KKN_KELOMPOK");

			$dropdown = array('' => 'Pilih Nama Kelompok');
				foreach($query->result_array() as $r) {
				$dropdown[$r['ID_KELOMPOK']] = $r['NAMA_KELOMPOK'];
				}
			return $dropdown;
		}

		 public function get_periode() {
		
		$query = $this->db->query("SELECT ID_PERIODE,KD_PERIODE,PERIODE FROM KKN_PERIODE");

			$dropdown = array('' => 'Pilih Periode , Kode Periode');
				foreach($query->result_array() as $r) {
				$dropdown[$r['ID_PERIODE']] = $r['PERIODE']." , ".$r['KD_PERIODE'];
				}
			return $dropdown;
		}
		
		
		public function get_dropdown_anggota_kkn() {
		
		$query = $this->db->query("SELECT NO, NIM, JK, FAK FROM KKN_MHS");

			$dropdown = array('' => 'Mahasiswa Peserta KKN');
				foreach($query->result_array() as $r) {
				$dropdown[$r['NO']] = $r['NIM']." , ".$r['JK']." , ".$r['FAK'];
				}
			return $dropdown;
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
		
		
		function get_anggotakelompok($id_kelompok){

			$query=$this->db->query("
			select A.NIM, INITCAP(A.NAMA) nama, A.PATH_FOTO , INITCAP(B.FAK) fak, C.RW ,INITCAP(C.DESA) desa, INITCAP(D.NM_KEC) nm_kec, INITCAP(E.NM_KAB) nm_kab, INITCAP(F.NM_PROP) nm_prop, G.ANGKATAN,INITCAP(H.NM_DOSEN) nm_dosen,to_char(I.TANGGAL_MULAI, 'dd-mm-yyyy') as mulai, to_char(I.TANGGAL_SELESAI, 'dd-mm-yyyy') as selesai, K.PERIODE, L.TA FROM D_MAHASISWA A,KKN_MHS B,KKN_KELOMPOK C,MD_KEC D,MD_KAB E,MD_PROP F,KKN_ANGKATAN G,D_DOSEN H,KKN_PERIODE I, KKN_DETAIL_KELOMPOK J, KKN_PERIODE K, KKN_TA L WHERE A.NIM=B.NIM AND C.KD_KEC=D.KD_KEC AND C.KD_KAB=E.KD_KAB AND C.KD_PROP=F.KD_PROP AND C.ID_ANGKATAN=G.ID_ANGKATAN AND G.KD_DOSEN=H.KD_DOSEN AND G.ID_PERIODE=I.ID_PERIODE AND J.ID_KELOMPOK=C.ID_KELOMPOK AND B.NO=J.NO AND G.ID_PERIODE=K.ID_PERIODE AND G.ID_TA=L.ID_TA AND j.ID_KELOMPOK=$id_kelompok");
			return $query;

		}

		function get_infokelompok($id_kelompok){
			$query=$this->db->query("select A.NAMA_KELOMPOK, A.RW, A.DESA, B.NM_KEC , C.NM_KAB , D.NM_PROP FROM KKN_KELOMPOK A, MD_KEC B, MD_KAB C, MD_PROP D WHERE A.KD_KEC=B.KD_KEC AND A.KD_KAB=C.KD_KAB AND A.KD_PROP=D.KD_PROP AND ID_KELOMPOK=$id_kelompok");
			return $query;

		}
		
		function to_csv($ta,$periode,$angkatan){

			$query=$this->db->query("select (C.NAMA_KELOMPOK) Nama_Kelompok_KKN, A.NIM, A.NAMA, A.HP_MHS, DECODE(A.J_KELAMIN,'L','Laki-Laki','P','Perempuan') Jenis_Kelamin ,A.GOL_DARAH, DECODE(A.STATUS_KAWIN,'B','Belum Kawin','K','Kawin') Status_Perkawinan,A.ALAMAT_MHS , (B.FAK) Fakultas, B.ALAMAT_JOGJA, B.RT_JOGJA, B.DESA_JOGJA , (C.RW) Lokasi_RW_KKN ,(C.DESA) Lokasi_Desa_KKN, (D.NM_KEC) Lokasi_Kec_KKN, (E.NM_KAB) Lokasi_Kab_KKN, (F.NM_PROP)Lokasi_prop_KKN, (G.ANGKATAN) Angkatan_KKN ,(H.NM_DOSEN) Nama_DPL,(I.TANGGAL_MULAI) Mulai_KKN, (I.TANGGAL_SELESAI) Selesai_KKN, (K.PERIODE) Periode_KKN, (L.TA) TA_KKN FROM D_MAHASISWA A,KKN_MHS B,KKN_KELOMPOK C,MD_KEC D,MD_KAB E,MD_PROP F,KKN_ANGKATAN G,D_DOSEN H,KKN_PERIODE I, KKN_DETAIL_KELOMPOK J, KKN_PERIODE K, KKN_TA L WHERE A.NIM=B.NIM AND C.KD_KEC=D.KD_KEC AND C.KD_KAB=E.KD_KAB AND C.KD_PROP=F.KD_PROP AND C.ID_ANGKATAN=G.ID_ANGKATAN AND C.KD_DOSEN=H.KD_DOSEN AND G.ID_PERIODE=I.ID_PERIODE AND J.ID_KELOMPOK=C.ID_KELOMPOK AND B.NO=J.NO AND G.ID_PERIODE=K.ID_PERIODE AND G.ID_TA=L.ID_TA AND L.ID_TA =$ta AND K.ID_PERIODE=$periode AND G.ID_ANGKATAN=$angkatan");
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
	
	
	function get_join_data()
	{
		  $query=$this->db->query("SELECT A.ID_ANGKATAN, A.ANGKATAN, B.PERIODE, C.TA ,D.NM_DOSEN FROM KKN_ANGKATAN A, KKN_PERIODE B, KKN_TA C , D_DOSEN D WHERE B.ID_PERIODE=A.ID_PERIODE AND C.ID_TA=A.ID_TA AND D.KD_DOSEN=A.KD_DOSEN");
   
		  return $query;
	
	
	
	}

	
	function get_data_page($limit, $offset)
	{
		  $query=$this->db->query("SELECT * FROM (SELECT K.*, ROWNUM rnum FROM(SELECT A.ID_ANGKATAN, A.ANGKATAN, B.PERIODE, C.TA ,D.NM_DOSEN FROM KKN_ANGKATAN A, KKN_PERIODE B, KKN_TA C , D_DOSEN D WHERE B.ID_PERIODE=A.ID_PERIODE AND C.ID_TA=A.ID_TA AND D.KD_DOSEN=A.KD_DOSEN ORDER BY A.ANGKATAN ASC) K WHERE ROWNUM <= $limit) WHERE rnum >= $offset");
   
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
		
	function getKelompokList(){
		$id_angkatan 	= $this->input->post('id_angkatan');
	
		$result = array();

		$array_keys_values = $this->db->query("SELECT ID_KELOMPOK, NAMA_KELOMPOK FROM KKN_KELOMPOK WHERE ID_ANGKATAN='$id_angkatan' ORDER BY NAMA_KELOMPOK ASC");
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Kelompok-';
            $result[$row->ID_KELOMPOK]= $row->NAMA_KELOMPOK;
        }
        
        return $result;
	}
		


}
