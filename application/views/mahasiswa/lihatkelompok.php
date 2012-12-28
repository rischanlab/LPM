<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Detail Peserta KKN | LPM UIN Sunan Kalijaga Yogyakarta</title>

<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet"
	type="text/css" />

</head>

	<div id="rightContent">
		<table class="data">
			<tr>
				<th class='data'>NIM</th>
				<th class='data'>Nama</th>
				<th class='data'>Fakultas</th>
				<th class='data'>HP</th>
			</tr>



			<?php

			foreach($query->result() as $row)
			{

				echo "<tr ><td class='data'>".$row->NIM."</td><td class='data'>".$row->NAMA."</td><td class='data'>".$row->FAK."</td><td class='data'>".$row->HP_MHS."</td><tr>";


					
} ?>




		</table>
	
	</div>

