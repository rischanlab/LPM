<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">




<title>Registrasi KKN UIN Sunan Kalijaga Yogyakarta</title>

<link
	href="<?php echo base_url(); ?>public/css/form.css" rel="stylesheet"
	type="text/css" />




<link rel="icon"
	href="http://registrasi.uin-suka.ac.id/uin_img/favicon.png"
	type="image/x-icon">
	<link rel="shortcut icon"
		href="http://registrasi.uin-suka.ac.id/uin_img/favicon.png"
		type="image/x-icon">
		<meta name="generator" content="PKSI">
		
		<script src="<?php echo base_url(); ?>public/js/jq-182.js"></script>
	
			</head>
			<body class="login_page">
				<script language="javascript" type="text/javascript">      
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
		$(document).ready(
    function(){
        $('input:file').change(
            function(){
                if ($(foto).val() && $(sk_sehat).val()&& $(sk_gol_darah).val() ) {
                    $('input:submit').attr('disabled',false); 
                } 
            }
            );
    });
</script>
				<div class="wrap_login_header"></div>
				<div class="banner_login"></div>
				<div class="wrap_login">

					<div class="wrap_login_rounded"
						style="color: #fff; font-size: 12px; text-align: left; background-color: #79B200; width: auto !important; padding: 20px; text-align: center">


						<!-- <li>Pengisian DPM dapat dilakukan satu hari kerja setelah pembayaran di Bank.</li> -->
						Upload Dokumen persyaratan KKN dibawah ini, filed yang wajib diisi
						adalah field foto, SK Sehat dari dokter, SK Golongan darah. Untuk
						SK Cuti Kerja harus di upload jika mahasiswa sudah bekerja, dan
						untuk SK Tidak hamil harus di upload bagi mahasiswi yang sudah
						menikah.

					</div>
					<br>

						<div class="wrap_login_rounded">
							<h1 class="log">Dokumen Persyaratan Peserta KKN</h1>
							<!-- You are login as <span id="typenya"><strong><?=$h1;?></strong></span>-->

							<?php echo form_open_multipart('form/do_upload');?>
							<table class="form form_login">
								<tbody>


									<div class="harus_diisi">
										<?php echo validation_errors(); ?>
									</div>


									<table class="form form_login">
										<tbody>

											<tr>
												<td valign="top" class="txt_login">Foto* png,jpg,jpeg</td>
												<td class="txt_login"><input type="file" name="foto"
													id="foto" class="txt_login">
												
												</td>
											</tr>
											<tr>
												<td valign="top" class="txt_login">Surat Kesehatan dari
													Dokter* jpg,pdf,doc</td>
												<td class="txt_login"><input type="file" name="sk_sehat"
													id="sk_sehat" class="txt_login">
												
												</td>
											</tr>
											<tr>
												<td valign="top" class="txt_login">Surat Ket.Gol.Darah dari
													Dokter* jpg,pdf,doc</td>
												<td class="txt_login"><input type="file" name="sk_gol_darah"
													id="sk_gol_darah" class="txt_login">
												
												</td>
											</tr>
											<tr>
												<td valign="top" class="txt_login">SK Tidak Hamil(bagi yang
													sudah menikah) jpg,pdf,doc</td>
												<td class="txt_login"><input type="file"
													name="sk_tidak_hamil" id="sk_tidak_hamil" class="txt_login">
												
												</td>
											</tr>
											<tr>
												<td valign="top" class="txt_login">SK Cuti (bagi yang
													bekerja) jpg,pdf,doc</td>
												<td class="txt_login"><input type="file"
													name="sk_cuti_kerja" id="sk_cuti_kerja" class="txt_login">
												
												</td>
											</tr>
											<td></td>



											<tr>
												<td></td>
												<td><input type="submit" name="subloginx"
													 value="Simpan" disabled />
												
												</td>
											</tr>

										</tbody>
									</table>






									</form>
									</div>
									</div>
									<div id="footer_login">© 2012 LPM — UIN Sunan Kalijaga,</div>