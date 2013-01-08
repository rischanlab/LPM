
	<div id="rightContent">
		<?php

		foreach($q->result() as $row)
		{
			echo "<table class='data'>";
			echo "<tr><th class='data'>Keterangan</th><th class='data'></th></tr>";
			echo "<tr ><td class='data'>Nama Kelompok</td><td class='data'>".$row->NAMA_KELOMPOK."</td></tr>";
		

			echo "<tr ><td class='data'>Nama Dosen Pembimbing Lapangan (DPL)</td><td class='data'>".$row->NM_DOSEN."</td></tr>";
			echo "<tr ><td class='data'>No HP (DPL)</td><td class='data'>".$row->MOBILE."</td></tr>";
			echo "<tr><th class='data'>Lokasi KKN</th><th class='data'></th></tr >";
			echo "<tr ><td class='data'>RW</td><td class='data'>".$row->RW."</td></tr>";
			echo "<tr ><td class='data'>Desa</td><td class='data'>".$row->DESA."</td></tr>";
			echo "<tr ><td class='data'>Kecamatan</td><td class='data'>".$row->NM_KEC."</td></tr>";
			echo "<tr ><td class='data'>Kabupaten</td><td class='data'>".$row->NM_KAB."</td></tr>";

			echo "</table>";

} ?>

	</div>

