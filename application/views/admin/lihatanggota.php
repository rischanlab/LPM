<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Kartu Peserta KKN </title>

<link href="<?php echo base_url(); ?>assets/mos-css/mos-style-adm.css"
	rel="stylesheet" type="text/css" />

<link rel="shortcut icon"
	href="<?php echo base_url(); ?>public/images/icon.png" />

</head>
<body>
<?php
$baris = 1; 
				foreach ($query->result() as $row) { 
				if($baris % 2==0){
							?>
							
							<div style="width: 300px; float: left; border: 1px;">
							<table width:100% >
							<tr ><th rowspan='2' ><img src='<?php echo base_url();?>uploads/uin.jpg ?>' width='30' align='center'></th><th  ><h2  >KARTU PESERTA KKN</h2></th></tr>
								
							<?php
								
							echo "<tr ><th > Angkatan $row->ANGKATAN, Periode $row->PERIODE, Tahun Akademik $row->TA</td></tr>";
							echo "<tr><td class='data' align='left'>Nama</td><td class='data' align='left'>$row->NAMA</td></tr>";
							echo "<tr><td class='data' align='left'>NIM/Fakultas</td><td class='data' align='left'>$row->NIM/$row->FAK</td></tr>";
							
							echo "<tr ><td class='data' align='left'>Lokasi KKN</td><td class='data'align='left'>$row->RW,$row->DESA,$row->NM_KEC,$row->NM_KAB,$row->NM_PROP</td></tr>";
							
							echo "<tr ><td class='data' align='left'>Berlaku</td><td class='data' align='left'>$row->MULAI sampai $row->SELESAI</td></tr>";

							?>
							<tr><td class='data'><img
								src="<?php echo base_url();?>uploads/foto/<?php echo $row->PATH_FOTO; ?>" width="50" align="center">
							
							</td>
							<?php
							
							echo "<td class='data' align='right'>Ketua Panitia KKN</td>";
							echo "<tr><td class='data'></td><td class='data' align='right'>$row->NM_DOSEN</td></tr>"
						
							?>
							
							</tr>
							</tr>
							</table>
							</div>
							
				<?php 
				
				} else {
				?>
				
				
								<div style="width: 300px; float: left;">
								<table width:100% >
								<tr ><th rowspan='2'><img
									src='<?php echo base_url();?>uploads/uin.jpg ?>' width='30' align='center'></th><th ><h2 color='#7FE817'>KARTU PESERTA KKN</h2></th></tr>
									
								<?php
								
								echo "<tr ><th color ='#7FE817'> Angkatan $row->ANGKATAN, Periode $row->PERIODE, Tahun Akademik $row->TA</td></tr>";
								echo "<tr><td class='data' align='left'>Nama</td><td class='data' align='left'>$row->NAMA</td></tr>";
								echo "<tr><td class='data' align='left'>NIM/Fakultas</td><td class='data' align='left'>$row->NIM/$row->FAK</td></tr>";
								
								echo "<tr ><td class='data' align='left'>Lokasi KKN</td><td class='data'align='left'>$row->RW,$row->DESA,$row->NM_KEC,$row->NM_KAB,$row->NM_PROP</td></tr>";
								
								echo "<tr ><td class='data' align='left'>Berlaku</td><td class='data' align='left'>$row->MULAI sampai $row->SELESAI</td></tr>";
								
								
								
								
								?>
								<tr><td class='data'><img
									src="<?php echo base_url();?>uploads/foto/<?php echo $row->PATH_FOTO; ?>" width="50" align="center">
								
								</td>
								<?php
								
								echo "<td class='data' align='right'>Ketua Panitia KKN</td>";
								echo "<tr><td class='data'></td><td class='data' align='right'>$row->NM_DOSEN</td></tr>"
							
								?>
								
								</tr>
								</table>
								</div>

								<?php
								
								}
				
					$baris++;
				}
				?>

</body>
</html>

			
			


