
	<div id="rightContent">
		<table class="data">
			<tr><b>Anggota Kelompok:</b></tr>
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

