 <div id="table">
        <table align="center">
        	<tr id="head">
            	<td id="no">No</td>
                <td id="angkatan" align="center">Angkatan</td>
                <td id="ta">TA</td>
                <td >Periode</td>
                <td id="ketupat">Ketua Panitia KKN</td>
                <td id="action">Action</td>
            </tr>
            <?php
			if ( !empty($cd_row) ) {
				$no = $page+1; 
				foreach ($cd_row->result() as $row) { ?>
				<tr id="row">
					<td id="no"><?php echo $no;?></td>
					<td id="angkatan"><?php echo $row->ANGKATAN;?></td>
					<td id="ta"><?php echo $row->TA;?></td>
					<td ><?php echo $row->PERIODE;?></td>
					<td id="ketupat"><?php echo $row->NM_DOSEN;?></td>
					<td id="action"> <a href="<?php echo site_url('admin/edit/'.$row->ID_ANGKATAN);?>">Edit</a> | <a href="<?php echo site_url('admin/delete/'.$row->ID_ANGKATAN);?>" onclick="return confirm('Are you sure?');">Delete</a></td>
					
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
		<?php echo $paginator; ?>
    </div>
</div>

</body>
</html>