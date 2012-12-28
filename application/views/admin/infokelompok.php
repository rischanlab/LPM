<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Detail Peserta KKN | LPM UIN Sunan Kalijaga Yogyakarta</title>

<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet"
	type="text/css" />

</head>
<body>
	<div id="isi">
		<?php

		foreach($q->result() as $row)
		{
			echo "<table width='775' bgcolor='#D6F3FF' cellpadding='2' cellspacing='1' class='widget-small'>";
			echo "<tr bgcolor='#C8E862' ><td>Keterangan</td><td></td></tr>";
			echo "<tr ><td width='30%'>Nama Kelompok</td><td>".$row->NAMA_KELOMPOK."</td></tr>";
			echo "<tr bgcolor='#C8E862' ><td width='30%'>Lokasi KKN</td><td></td></tr >";
			echo "<tr ><td width='30%'>RW</td><td>".$row->RW."</td></tr>";
			echo "<tr ><td width='30%'>Desa</td><td>".$row->DESA."</td></tr>";
			echo "<tr ><td width='30%'>Kecamatan</td><td>".$row->NM_KEC."</td></tr>";
			echo "<tr ><td width='30%'>Kabupaten</td><td>".$row->NM_KAB."</td></tr>";

			echo "</table>";

} ?>

	</div>
</body>
</html>
