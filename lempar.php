<?php
session_start();
session_cache_expire(1);

//$cek_status= $_SESSION['data']['status'];
if ($_SESSION['data']['status']=='1'){ //jika status =1 maka dilempar ke form/mahasiswa
		?>
			<script language=javascript>window.location='/LPM/form';</script>"
		<?php
	} 
if($_SESSION['data']['status']=='2'){ //jika status =2 maka dilempar ke dosen
	
	?>
			<script language=javascript>window.location='/LPM/dosen';</script>"
		<?php
		
	}
	else{
?>
<script type="text/javascript">
			alert("Anda Harus Login Melalui SIA..!!!");	
			window.location = "http://sia.uin-suka.ac.id/"
			</script>

<?php
}	


?>