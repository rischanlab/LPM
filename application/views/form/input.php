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
			</head>
			<body class="login_page">
				<script language="javascript" type="text/javascript">      
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
function loadImages() {
if (document.getElementById) {  // DOM3 = IE5, NS6
document.getElementById('hidepage').style.display = 'none';
}
}
window.onload = loadImages;
//  End -->
</script>
				<div class="wrap_login_header"></div>
				<div class="banner_login"></div>
				<div class="wrap_login">

					<div class="wrap_login_rounded"
						style="color: #fff; font-size: 12px; text-align: left; background-color: #79B200; width: auto !important; padding: 20px; text-align: center">


						<!-- <li>Pengisian DPM dapat dilakukan satu hari kerja setelah pembayaran di Bank.</li> -->
						Pastikan Anda mengisi formulir registrasi online ini sampai
						selesai. Anda Hanya bisa mengisi field yang berwarna putih.

					</div>
					<br>

						<div class="wrap_login_rounded">
							<h1 class="log">Data Mahasiswa Peserta KKN</h1>
							<!-- You are login as <span id="typenya"><strong><?=$h1;?></strong></span>-->

							<form action="<?php echo base_url(); ?>form/update" method="POST">
								<table class="form form_login">
									<tbody>


										<div class="harus_diisi">
											<?php echo validation_errors(); ?>
										</div>



										

										<tr>
											<td valign="top" class="txt_login">Nama</td>
											<td class="txt_login"><input type="text" readonly="true"
												name="nama" class="inputx"
												value="<?php echo set_value('NAMA',$this->form_data->NAMA); ?>" />


											</td>
										</tr>

										<tr>
											<td valign="top" class="txt_login">NIM</td>
											<td class="txt_login"><input type="text" readonly="true"
												name="nim" class="inputx"
												value="<?php echo set_value('NIM',$this->form_data->NIM); ?>" />
											</td>
										</tr>

										<tr>
											<td valign="top" class="txt_login">Fakultas</td>
											<td class="txt_login"><input type="text" readonly="true"
												name="fak" class="inputx"
												value="<?php echo set_value('NM_FAK',$this->form_data->NM_FAK); ?>" />
											</td>
										</tr>

										<tr>
											<td valign="top" class="txt_login">Prodi</td>
											<td class="txt_login"><input type="text" readonly="true"
												name="prodi" class="inputx"
												value="<?php echo set_value('NM_PRODI',$this->form_data->NM_PRODI); ?>" />
											</td>
										</tr>

										<tr>
											<td valign="top" class="txt_login">Angkatan</td>
											<td class="txt_login"><input type="text" readonly="true"
												name="angkatan" class="inputx"
												value="<?php echo set_value('ANGKATAN',$this->form_data->ANGKATAN); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">Jenis Kelamin</td>
											<td class="txt_login"><input type="text" readonly="true"
												name="j_kelamin" class="inputx"
												value="<?php echo set_value('J_KELAMIN',$this->form_data->J_KELAMIN); ?>" />
											</td>
										</tr>

										<tr>
											<td valign="top" class="txt_login">No HP (Pribadi)*</td>
											<td class="txt_login"><input type="text" name="hp_mhs"
												class="inputy"
												value="<?php echo set_value('HP_MHS',$this->form_data->HP_MHS); ?>">
											
											</td>
										</tr>

										<tr>
											<td valign="top" class="txt_login">Golongan Darah*</td>
											<td class="txt_login"><input type="text" name="gol_darah"
												class="inputy"
												value="<?php echo set_value('GOL_DARAH',$this->form_data->GOL_DARAH); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">Tinggi Badan*</td>
											<td class="txt_login"><input type="text" name="tinggi"
												class="inputy"
												value="<?php echo set_value('TINGGI',$this->form_data->TINGGI); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">Berat Badan*</td>
											<td class="txt_login"><input type="text" name="berat"
												class="inputy"
												value="<?php echo set_value('BERAT',$this->form_data->BERAT); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">Pekerjaan*</td>
											<td class="txt_login"><input type="text" name="pekerjaan"
												class="inputy"
												value="<?php echo set_value('PEKERJAAN',$this->form_data->PEKERJAAN); ?>" />


											</td>
										</tr>

										<tr>
											<td valign="top" class="txt_login">Status Perkawinan</td>
											<td><?php echo ($this->form_data->STATUS_KAWIN == 'B')?form_radio('STATUS_KAWIN','B',true):form_radio('STATUS_KAWIN','B',false); ?>Belum
												Menikah &nbsp; <?php echo ($this->form_data->STATUS_KAWIN == 'K')?form_radio('STATUS_KAWIN','K',true):form_radio('STATUS_KAWIN','K',false); ?>Menikah
												&nbsp;</td>
										</tr>

										</tr>
										<tr>
											<td valign="top" class="txt_login">Transportasi*</td>
											<td class="txt_login"><input type="text" name="transportasi"
												class="inputy"
												value="<?php echo set_value('TRANSPORTASI',$this->form_data->TRANSPORTASI); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">Prestasi/Keahlian*</td>
											<td class="txt_login"><input type="text" name="prestasi"
												class="inputy"
												value="<?php echo set_value('PRESTASI',$this->form_data->PRESTASI); ?>" />
											</td>
										</tr>

									</tbody>
								</table>



								<h3 class="garis">Alamat Asal</h3>
								<table class="form form_login">
									<tbody>

										<tr>
											<td valign="top" class="txt_login">Alamat Mahasiswa</td>
											<td class="txt_login"><input type="text" readonly="true"
												name="alamat_mhs" class="inputx"
												value="<?php echo set_value('ALAMAT_MHS',$this->form_data->ALAMAT_MHS); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">RT</td>
											<td class="txt_login"><input type="text" readonly="true"
												name="rt" class="inputx"
												value="<?php echo set_value('RT',$this->form_data->RT); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">Desa/Kelurahan</td>
											<td class="txt_login"><input type="text" readonly="true"
												name="desa" class="inputx"
												value="<?php echo set_value('DESA',$this->form_data->DESA); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">Kecamatan</td>
											<td class="txt_login"><input type="text" readonly="true" name="nm_kec"
												class="inputx">
											
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">Kabupaten</td>
											<td class="txt_login"><input type="text" readonly="true"
												name="nm_kab" class="inputx"
												value="<?php echo set_value('NM_KAB',$this->form_data->NM_KAB); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">Propinsi</td>
											<td class="txt_login"><input type="text" readonly="true"
												name="nm_prop" class="inputx"
												value="<?php echo set_value('NM_PROP',$this->form_data->NM_PROP); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">Telp *</td>
											<td class="txt_login"><input type="text" name="telp_mhs"
												class="inputy"
												value="<?php echo set_value('TELP_MHS',$this->form_data->TELP_MHS); ?>" /><br />
												Nomor Telp Rumah yang bisa dihubungi (Telp, Bpk, Ibu).</td>
										</tr>

									</tbody>
								</table>


								<h3 class="garis">Alamat Jogja</h3>
								<table class="form form_login">
									<tbody>

										<tr>
											<td valign="top" class="txt_login">Alamat Jogja*</td>
											<td class="txt_login"><input type="text" name="alamat_jogja"
												class="inputy"
												value="<?php echo set_value('ALAMAT_JOGJA',$this->form_data->ALAMAT_JOGJA); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">RT/RW</td>
											<td class="txt_login"><input type="text" name="rt_jogja"
												class="inputy"
												value="<?php echo set_value('RT_JOGJA',$this->form_data->RT_JOGJA); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">Desa/Kelurahan*</td>
											<td class="txt_login"><input type="text" name="desa_jogja"
												class="inputy"
												value="<?php echo set_value('DESA_JOGJA',$this->form_data->DESA_JOGJA); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">Kecamatan*</td>
											<td class="txt_login"><input type="text" name="nm_kec_jogja"
												class="inputy"
												value="<?php echo set_value('NM_KEC_JOGJA',$this->form_data->NM_KEC_JOGJA); ?>" />
											</td>
										</tr>
										<tr>
											<td valign="top" class="txt_login">Kabupaten*</td>
											<td class="txt_login"><input type="text" name="nm_kab_jogja"
												class="inputy"
												value="<?php echo set_value('NM_KAB_JOGJA',$this->form_data->NM_KAB_JOGJA); ?>" />
											</td>




											<tr>
												<td></td>
												<td><input type="submit" name="subloginx"
													class="button_login" value="Simpan">
												
												</td>
											</tr>
									
									</tbody>
								</table>


							</form>
						</div>
				
				</div>
				<div id="footer_login">© 2012 LPM — UIN Sunan Kalijaga,</div>


			</body>
			</html>