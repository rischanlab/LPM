<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Angkatan KKN</title>
<link href="<?php echo base_url(); ?>assets/mos-css/mos-style0.css"
	rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>public/css/angkatan.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui.css" type="text/css" media="all" />
  <style type="text/css">
      @import "<?php echo base_url();?>assets/json/jquery.autocomplete.css";
  </style>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/js/ui.theme.css" type="text/	css" media="all" />
		<script src="<?php echo base_url();?>assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
	<!--	
		<script type="text/javascript">
		       $(function() {
			$("#kd_dosen").autocomplete({
				source: function( request, response ) {
				$.ajax({
					url: "http://localhost/LPM/admin/cobajson",
					dataType: "json",
					data: {term: request.term},
					success: function(data) {
            					response($.map(data, function(item) {
                				return {
									label: item.NM_DOSEN,
									id: item.KD_DOSEN,
									kd_dosen:item.NM_DOSEN
									};
            				}));
						}
					});
				},
				minLength: 2,
				select: function(event, ui) {
					//$('#state_id').val(ui.item.KD_DOSEN);
				
				}
			});
		});

		 </script>
		 
		 -->
</head>
<body>



<?php
	if (empty($cd)) {
		$cd = new stdClass();
		$cd->ID_ANGKATAN = '';
		$cd->ANGKATAN = '';
		$cd->ID_TA = '';
		$cd->ID_PERIODE = '';		
		$cd->KD_DOSEN = '';	
		$cd->SK_SERTIFIKAT = '';
		$type = 'inputangkatan';	
	} else {
		$type = 'update';
	}
?>
<div id="container">
	<h1>Manage Angkatan KKN</h1>
  
    <div id="form">
		<?php
        	echo form_open('admin/'.$type);
			echo form_hidden('id_angkatan',$cd->ID_ANGKATAN);
		?>
        <div id="field">
            <span class="label">Angkatan</span>
            <?php echo form_input(array('name'=>'angkatan','maxlength'=>50,'value'=>$cd->ANGKATAN));?>
            <?php echo form_error('angkatan'); ?>
        </div>
        <div id="field">
            <span class="label">TA</span>
           <?php
			echo form_dropdown("id_ta",$option_ta,"","id='id_ta'");?>
            <?php echo form_error('id_ta'); ?>
        </div>
        <div id="field">
		<span >Periode</span>
		<div id="periode">
            
            	<?php
			echo form_dropdown("id_periode",array('Pilih Periode '=>'Pilih TA Dahulu'),'','disabled');
				?>
            <?php echo form_error('id_periode'); ?>
        </div>
		</div>
	<!-- 
	<div id="field">
	<span class="label">Ketua Panitia KKN</span>
	<input type="text" id="kd_dosen" name="kd_dosen" />
	</div>
   	  -->
     
	<div id="field">
            <span >SK Sertifikat</span>
            <?php echo form_input(array('name'=>'sk_sertifikat','maxlength'=>100,'value'=>$cd->SK_SERTIFIKAT));?>
            <?php echo form_error('sk_sertifikat'); ?>
        </div>
	  
	  
	  
        <div id="field">
            <span class="label">&nbsp;</span>
            <?php echo form_submit(array('name'=>'submit','id'=>'submit','value'=>'Submit'));?>
			<?php if ($type=='update') { ?>
            <input type="button" id="button" value="Cancel" onclick="window.location.href='<?=site_url('admin/angkatan');?>'"/>
            <?php } ?>
        </div>
        <?php echo form_close(); ?>
    </div>
   
<script type="text/javascript">
	  	$("#id_ta").change(function(){
	    		var selectValues = $("#id_ta").val();
	    		if (selectValues == 0){
	    			var msg = "<br><select name=\"id_periode\" disabled><option value=\"Pilih periode\">Pilih TA Dahulu</option></select>";
	    			$('#periode').html(msg);
	    		}else{
	    			var id_ta = {id_ta:$("#id_ta").val()};
	    			$('#id_periode').attr("disabled",true);
	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('admin/select_periode')?>",
							data: id_ta,
							success: function(msg){
								$('#periode').html(msg);
							}
				  	});
	    		}
	    });
	   </script>
