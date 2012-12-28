<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Detail Peserta KKN | LPM UIN Sunan Kalijaga Yogyakarta</title>

<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet"
	type="text/css" />

</head>

	<div id="rightContent">
		<?php

		foreach($kknangkatan->result() as $row)
		{
			echo "<table class='data'>";
			echo "<tr ><th class='data'><b>Peserta KKN UIN Sunan Kalijaga</b></th></tr>";
			echo "<tr ><td class='data'> Angkatan $row->ANGKATAN, Periode $row->PERIODE , Tahun Akademik $row->TA </td></tr>";
			echo "<tr ><td class='data'>Mulai $row->TANGGAL_MULAI sampai dengan $row->TANGGAL_SELESAI</td></tr>";



			

			echo "</table>";

} ?>

	</div>

