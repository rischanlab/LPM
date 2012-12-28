<?php
session_start();
session_cache_expire(1);

// menangkap kiriman get dari ASP 
if(isset($_GET['kd_kelas'])) { $kd_kelas = $_GET['kd_kelas']; } 
if(isset($_GET['nm_kelas'])) { $nm_kelas = $_GET['nm_kelas']; } 
if(isset($_GET['kd_ta'])) { $kd_ta = $_GET['kd_ta']; } 
if(isset($_GET['kd_smt'])) { $kd_smt = $_GET['kd_smt']; } 
if(isset($_GET['id_user'])) { $id_user = $_GET['id_user']; } 
if(isset($_GET['nm_user'])) { $nm_user = $_GET['nm_user']; } 
if(isset($_GET['kd_kur'])) { $kd_kur = $_GET['kd_kur']; } 
if(isset($_GET['kd_prodi'])) { $kd_prodi = $_GET['kd_prodi']; } 
if(isset($_GET['nm_prodi'])) { $nm_prodi = $_GET['nm_prodi']; } 
if(isset($_GET['kd_mk'])) { $kd_mk = $_GET['kd_mk']; } 
if(isset($_GET['sks_mk'])) { $sks_mk = $_GET['sks_mk']; } 
if(isset($_GET['status'])) { $status = $_GET['status'];


// menyimpannya ke dalam sesion	
$_SESSION['data']['kd_kelas']=$kd_kelas; // session kode kelas
$_SESSION['data']['nm_kelas']=$nm_kelas; // session nama kelas
$_SESSION['data']['kd_ta'] =$kd_ta;  // session tahun ajaran aktif saat ini
$_SESSION['data']['kd_smt'] =$kd_smt; // session semester aktif saat ini
$_SESSION['data']['id_user'] =$id_user; // sessio NIM / NIP 
$_SESSION['data']['nm_user'] =$nm_user; // session nama user yang login, bisa mahasiswa atau dosen
$_SESSION['data']['kd_kur'] =$kd_kur; // session kode kurikulum
$_SESSION['data']['kd_prodi'] =$kd_prodi;  // kd_prodi
$_SESSION['data']['nm_prodi'] =$nm_prodi; // nama prodi
$_SESSION['data']['kd_mk'] =$kd_mk; // kd matakuliah
$_SESSION['data']['sks_mk']=$sks_mk; // sks matakuliah
$_SESSION['data']['status']=$status; // status login, 1= mahasiswa , 2 dosen

	
echo("<script language=javascript>window.location='http://localhost/LPM/lempar.php';</script>");
	
}else{
?>
<script type="text/javascript">
			alert("Anda Harus Login Melalui SIA..!!!");	
			window.location = "http://sia.uin-suka.ac.id/"
			</script>

<?php
}	


?>