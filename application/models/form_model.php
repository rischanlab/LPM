<?php
class Form_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function cek_waktu_kkn(){
		$waktu = $this->db->query("SELECT TO_CHAR(FIRST_DATE,'MM/DD/YYYY')FIRST_DATE, TO_CHAR(LAST_DATE,'MM/DD/YYYY')LAST_DATE  FROM KKN_PENDAFTARAN");
		return $waktu;
	}
	
	
	function cek_mk_kkn_sia($nim, $kd_mk){
		$q = $this->db->query("SELECT A.KD_KRS, DECODE(A.STATUS_ULANG,'B','BARU','U','ULANG') STATUS_ULANG, A.NILAI,A.BOBOT_NILAI,E.TA,B.KD_PRODI,B.KD_MK,B.KD_TA FROM D_DETAIL_KRS A, V_KELAS B, D_URUT_KELAS C , D_KRS D, D_TA E, D_SEMESTER F WHERE A.KD_KELAS = B.KD_KELAS AND A.KD_KRS = C.KD_KRS (+) AND A.KD_KELAS = C.KD_KELAS (+) AND D.NIM = '$nim' AND D.KD_KRS = A.KD_KRS AND D.SEMESTER = (select max(SEMESTER) from D_KRS where nim = '$nim') AND F.KD_SMT = D.KD_SMT AND E.KD_TA = (select max(KD_TA) from D_KRS where nim ='$nim') AND B.KD_MK='$kd_mk';");
		return $q;
	
	}
	
	function cek_mk($kd_mk){
		$query=$this->db->query("SELECT A.KD_FAK,A.NM_FAK,B.ID_MK,B.KD_MK FROM KKN_FAK A, KKN_MATAKULIAH B WHERE A.ID_FAK=B.ID_FAK AND KD_MK ='$kd_mk'");
		return $query;
	}
	function get_data_from_db_sia($nim){
		$query=$this->db->query("SELECT A.NIM, A.ANGKATAN, A.NAMA,A.TMP_LAHIR, A.TGL_LAHIR, A.NM_KEC, A.TELP_MHS,A.GOL_DARAH, A.BERAT, A.TINGGI,A.PEKERJAAN, A.STATUS_KAWIN, A.ALAMAT_MHS ,A.RT,A.DESA, A.HP_MHS,B.NM_PRODI, C.NM_JURUSAN, D.KD_FAK, D.NM_FAK,  DECODE(A.J_KELAMIN,'L','Laki-laki','P','Perempuan') J_KELAMIN, E.NM_KAB,F.NM_PROP FROM D_MAHASISWA A, MASTER_PRODI B, MASTER_JURUSAN C, MASTER_FAK D, MD_KAB E, MD_PROP F WHERE A.KD_KAB=E.KD_KAB AND A.KD_PRODI = B.KD_PRODI AND B.KD_JURUSAN = C.KD_JURUSAN AND C.KD_FAK = D.KD_FAK AND A.KD_PROP=F.KD_PROP AND A.NIM='$nim'");
		return $query;
	
	}
	function get_data_dosen($kd_dosen){
		$query=$this->db->query("SELECT KD_DOSEN,NM_DOSEN FROM KKN_DPL WHERE KD_DOSEN='$kd_dosen'");
		return $query;
	
	}
	
	function insert_data_to_kkn_mhs($mhs){
		return $this->db->insert('KKN_MHS', $mhs); 
	}
	
	function cek_sudah($nim){
		$query=$this->db->query("SELECT * FROM KKN_MHS WHERE NIM ='$nim'");
		return $query;
	}
	function cek_sudah_poli($nim){
		$query=$this->db->query("SELECT * FROM KKN_POLI WHERE NIM ='$nim'");
		return $query;
	}
	
	function ganti_sudah_jadi_1($nim){
		$query=$this->db->query("update KKN_MHS set SUDAH='1' where NIM='$nim'");
		return $query;

	}
	function ganti_sudah_jadi_2($nim){
		$query=$this->db->query("update KKN_MHS set SUDAH='2' where NIM='$nim'");
		return $query;

	}
	function insert_foto($nim,$foto){
		$query=$this->db->query("update KKN_MHS set PATH_FOTO='$foto' where NIM='$nim' ");

	}

	function insert_sk_sehat($nim,$sehat){
		$query=$this->db->query("update KKN_MHS set PATH_SK_DOKTER='$sehat' where NIM='$nim'");

	}

	function insert_sk_gol_darah($nim,$gol_darah){
		$query=$this->db->query("update KKN_MHS set PATH_SK_GOLONGAN_DARAH='$gol_darah'	where NIM='$nim' ");

	}
	function insert_sk_cuti_kerja($nim,$cuti){
		$query=$this->db->query("update KKN_MHS set PATH_SK_CUTI='$cuti' where NIM='$nim'");

	}
	function insert_sk_tidak_hamil($nim,$tidak_hamil){
		$query=$this->db->query("update KKN_MHS set PATH_SK_TIDAK_HAMIL='$tidak_hamil' where NIM='$nim'");

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	
	function list_all(){
		return $this->db->get($D_MAHASISWA);
	}

	function count_all(){
		return $this->db->count_all($this->D_MAHASISWA);
	}

	function get_by_nim($nim){

		$query=$this->db->query("SELECT A.NIM, A.ANGKATAN, A.NAMA,A.TELP_MHS,A.GOL_DARAH, A.BERAT, A.TINGGI,A.PEKERJAAN, A.STATUS_KAWIN, A.ALAMAT_MHS ,A.RT,A.DESA, A.HP_MHS,B.NM_PRODI, C.NM_JURUSAN, D.NM_FAK,  DECODE(A.J_KELAMIN,'L','Laki-laki','P','Perempuan') J_KELAMIN, E.NM_KAB,F.NM_PROP FROM D_MAHASISWA A, MASTER_PRODI B, MASTER_JURUSAN C, MASTER_FAK D, MD_KAB E, MD_PROP F WHERE A.KD_KAB=E.KD_KAB AND A.KD_PRODI = B.KD_PRODI AND B.KD_JURUSAN = C.KD_JURUSAN AND C.KD_FAK = D.KD_FAK AND A.KD_PROP=F.KD_PROP AND A.NIM='$nim'");
		return $query;
	}


	function Insert_NIM($datainput)
	{
		$this->db->insert('KKN_MHS',$datainput);
	}

	function lihat_NIM($nim){
		$query=$this->db->query("SELECT * FROM KKN_MHS WHERE NIM ='$nim'");
		return $query;
	}



	function update_d_mahasiswa($nim, $mahasiswa){
			
		$this->db->where('NIM', $nim);
		$this->db->update('D_MAHASISWA', $mahasiswa);
	}

	function update_kkn_mhs($nim, $mhs){
			
		$this->db->where('NIM', $nim);
		$this->db->update('KKN_MHS', $mhs);


	}

	**/

	





}
?>
