<?php
if ($this->session->userdata('logged_in') != TRUE)
{

	redirect('http://sia.uin-suka.ac.id');
}
else
			{ ?>


<title>Registrasi KKN UIN Sunan Kalijaga Yogyakarta</title>

<link
	href="<?php echo base_url(); ?>public/css/form.css" rel="stylesheet"
	type="text/css" />




<link
	rel="icon" href="http://registrasi.uin-suka.ac.id/uin_img/favicon.png"
	type="image/x-icon">
<link
	rel="shortcut icon"
	href="http://registrasi.uin-suka.ac.id/uin_img/favicon.png"
	type="image/x-icon">
<meta name="generator"
	content="PKSI">
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



			Pastikan Anda membaca dengan seksama isi dari surat pernyataan ini,
			Anda harus menyetujui Surat Pernyataan ini jika anda ingin mendaftar
			KKN. </br>by LPM UIN Sunan Kalijaga

		</div>
		<br>

		<div class="wrap_login_rounded">
			<h1 class="log">Surat Pernyataan KKN LPM UIN Sunan Kalijaga
				Yogyakarta</h1>
			<!-- You are login as <span id="typenya"><strong><?=$h1;?></strong></span>-->
			<form action="<?php echo "".base_url()."index.php/form/input" ?>"
				method="POST">
				<table class="form form_login">
					<tbody>






						<h2 class="txt_login">
							Saya
							<? echo $this->session->userdata('nm_user'); ?>
							dari Prodi
							<? echo $this->session->userdata('nm_prodi'); ?>
							menyatakan bahwa :
						</h2>
						<tr>
							<td valign="top" class="txt_login">Bersedia ditempatkan di lokasi
								manapun yang ditetapkan oleh Panitia Pelaksana KKN;</td>
						</tr>
						<tr>
							<td valign="top" class="txt_login">Saya berjanji akan menjalankan
								kewajiban-kewajiban yang telah digariskan serta peraturan dan
								ketentuan yang dikeluarkan oleh Lembaga Pengabdian kepada
								Masyarakat (LPM) UIN Sunan Kalijaga, Panitia Pelaksana dengan
								sebaik-baiknya dengan penuh rasa tanggung jawab serta dedikasi
								tinggi sesuai dengan Buku Pedoman dan Peraturan Tata Tertib KKN
								UIN Sunan Kalijaga Yogyakarta yang berlaku;</td>
						</tr>
						<tr>
							<td valign="top" class="txt_login">Saya berjanji tidak akan
								melakukan kegiatan: berbicara, mempengaruhi, bertindak dalam
								politik praktis dan tidak akan melakukan tindakan yang dapat
								mencemarkan nama baik UIN Sunan Kalijaga;</td>
						</tr>
						<tr>
							<td valign="top" class="txt_login">Apabila saya terbukti tidak
								menjalankan kewajiban-kewajiban KKN dan atau melakukan kegiatan
								politik praktis selama KKN, saya sanggup menerima sangsi dari
								UIN Sunan Kalijaga dan atau yang berwajib sesuai dengan
								peraturan yang berlaku.</td>
						</tr>




					</tbody>
				</table>

				<table class="form form_login">
					<tbody>
						<tr>
							<td><?php

							$agreeCheck = array( 'name' => 'agreeCheck', 'id' => 'agreeCheck', 'value' => 'agree', 'checked' => set_checkbox('agreeCheck', 'agree', FALSE));
							echo form_checkbox($agreeCheck);

							?>Saya Setuju dengan pernyataan Ini.</td>


							<td><input type="submit" name="subloginx" class="button_login"
								value="Lanjut"></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
	<div id="footer_login">© 2012 LPM — UIN Sunan Kalijaga,</div>

</body>
</html>

<?php
	} 
		?>