<!DOCTYPE html>
<html>
<head>
<?php 
foreach($css_files as $file): ?>
<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url(); ?>assets/mos-css/mos-style0.css"
	rel="stylesheet" type="text/css" />

<link rel="shortcut icon"
	href="<?php echo base_url(); ?>public/images/icon.png" />
<title>Panel Admin | KKN LPM UIN Sunan Kalijaga Yogyakarta</title>


</head>
<body>

	<div>

	
	</div>
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/manage/peserta_kkn_management" ><img src="<?php echo base_url(); ?>assets/mos-css/img/pesertaskrang.png"><br>Peserta Belum dpt Kelompok</a>
		</div>
		
	
		
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/manage/peserta_kkn_management_all" ><img src="<?php echo base_url(); ?>assets/mos-css/img/allmember.png"><br>KKN Semua Angkatan</a>
		</div>
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/manage/ta_management" ><img src="<?php echo base_url(); ?>assets/mos-css/img/ta.png"><br>Atur Tahun Akademik</a>
		</div>
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/manage/periode_management" ><img src="<?php echo base_url(); ?>assets/mos-css/img/periode.png"><br>Atur Periode</a>
		</div>
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/admin/angkatan" ><img src="<?php echo base_url(); ?>assets/mos-css/img/angkatan.png"><br>Atur Angkatan</a>
		</div>
		
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/manage/kelompok_management"><img src="<?php echo base_url(); ?>assets/mos-css/img/kelompok.png"><br>Atur Kelompok</a>
		</div>
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/manage/detail_kelompok_management"><img src="<?php echo base_url(); ?>assets/mos-css/img/group.png"><br>Tambahkan Anggota ke Kelompok</a>
		</div>
		<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>admin/export" target="_blank"><img src="<?php echo base_url(); ?>assets/mos-css/img/cetak.png"><br>Cetak Kartu KKN</a>
		</div>
			<div class="shortcutHome">
		<a href="<?php echo base_url(); ?>index.php/admin/download_peserta" ><img src="<?php echo base_url(); ?>assets/mos-css/img/peserta.png"><br>Peserta KKN per Periode</a>
		</div>
		
		
		
		<div class="clear"></div>
		
	
	</div>
	<div style='height: 20px;'></div>
	<div>
		<?php echo $output; ?>
	</div>
</body>
</html>
