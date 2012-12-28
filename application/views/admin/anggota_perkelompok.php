 <div id="table">
        <table align="center">
        	<tr id="head">
            	<td id="no">No</td>
				<td id="id_kelompok" align="center">id Kelompok</td>
				<td id="kelompok" align="center">Kelompok</td>
                <td id="nim" align="center">Nim</td>
				<td id="nama" align="center">Nama</td>
				<td id="jk" align="center">Jenis Kelamin</td>
				<td id="fak" align="center">Fakultas</td>
            </tr>
            <?php
			if ( !empty($isi) ) {
				$page=0;
				$no = $page+1; 
				foreach ($isi->result() as $row) { ?>
				<tr id="row">
					<td id="no"><?php echo $no;?></td>
					<td id="kelompok"><?php echo $row->ID_KELOMPOK;?></td>
					<td id="kelompok"><?php echo $row->NAMA_KELOMPOK;?></td>
					<td id="nim"><?php echo $row->NIM;?></td>
					<td id="nama"><?php echo $row->NAMA;?></td>
					<td id="jk"><?php echo $row->JK;?></td>
					<td id="fak"><?php echo $row->FAK;?></td>
					<td id="action"> <a href="<?php echo site_url('admin/delete_anggota/'.$row->ID_DETAIL_KELOMPOK);?>" onclick="return confirm('Are you sure?');">Delete</a></td>
					
				</tr>
				
				
				<?php
					$no++;
				}
				
				
			} else { ?>
                <tr id="row">
                <td colspan="6" align="center">EMPTY</td>
                </tr>
            <?
			}
			
			
			?>
        </table>
	
    </div>
</div>

</body>
</html>