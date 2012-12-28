<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Angkatan KKN</title>
<link href="<?php echo base_url(); ?>assets/mos-css/mos-style0.css"
	rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>public/css/angkatan.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/js/ui.theme.css" type="text/	css" media="all" />
		<script src="<?php echo base_url();?>assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
</head>
<body>
	<div>
	<h3 align="center">Control Panel Admin  <a href="<?php echo base_url(); ?>kkn/logout_admin"><font color="red">Logout</font></a></h3>
	
	
</div>
	
	
	</div>
	<br/>
	
	

<?php
	if (empty($cd)) {
		$cd->ID_KELOMPOK = '';
	    $cd->NO = '';
		
		$type = 'inputanggotakelompok';	
	} else {
		$type = 'updateanggota';
	}
?>
<div id="container">
	<h1>Manage Angkatan KKN</h1>
  
    <div id="form">
	
	
		<?php
			$id_kelompok='';
			$nama_kelompok='';
			foreach ($isi->result() as $row) {
				$id_kelompok			=$row->ID_KELOMPOK;
				$nama_kelompok		=$row->NAMA_KELOMPOK;
			
			}
			
			if (($id_kelompok!='')&&($nama_kelompok!='')){
				//echo $id_kelompok;
				?>
				<span><h3>Nama Kelompok : </h3></span>
			<?php
				echo $nama_kelompok;
			}else{
			echo "suraaaaaaaaaaaaaaaaaaaaaaaaaaaam";
			
			}
	?>
		<?php
        	echo form_open('admin/'.$type);
			echo form_hidden('id_kelompok',$id_kelompok);
		?>
        
        <div id="field">
            <span class="label">Peserta KKN</span>
            	<?php
				echo form_dropdown("no",$anggota,'maxlength="12"',"id='no'");
			?>
            <?php echo form_error('no'); ?>
        </div>
	  
	  
	  
	  
        <div id="field">
            <span class="label">&nbsp;</span>
            <?php echo form_submit(array('name'=>'submit','id'=>'submit','value'=>'Submit'));?>
			<?php if ($type=='updateanggota') { ?>
            <input type="button" id="button" value="Cancel" onclick="window.location.href='<?=site_url('admin/');?>'"/>
            <?php } ?>
        </div>
        <?php echo form_close(); ?>
    </div>
   
