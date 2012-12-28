<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
	<title><?=$title?></title>
	<link href="<?=base_url()?>templates/css/general.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url()?>templates/css/imgareaselect-animated.css" rel="stylesheet" type="text/css" />
	<script src="<?=base_url()?>templates/js/jquery-1.6.1.min.js" type="text/javascript" language="javascript"></script>
	<script src="<?=base_url()?>templates/js/functions.js" type="text/javascript" language="javascript"></script>
	<script src="<?=base_url()?>templates/js/jquery.imgareaselect.pack.js" type="text/javascript" language="javascript"></script>

	<!-- script lanjutan-->
	<script type="text/javascript">
	var base_url = "<?=base_url()?>";
	
	function load_simple_upload(){
		get_html_data(base_url+"upload/upload_form/simple/",'', 'btn_loading', 'upload_form_pic');
	}
	</script>
	
	<script type="text/javascript">
            function preview(img, selection) {
                if (!selection.width || !selection.height)
                    return;
                
                var scaleX = 100 / selection.width;
                var scaleY = 100 / selection.height;
            
                $('#preview img').css({
                    width: Math.round(scaleX * img.width),
                    height: Math.round(scaleY * img.height),
                    marginLeft: -Math.round(scaleX * selection.x1),
                    marginTop: -Math.round(scaleY * selection.y1)
                });
            
                $('#x1').val(selection.x1);
                $('#y1').val(selection.y1);
                $('#x2').val(selection.x2);
                $('#y2').val(selection.y2);
                $('#w').val(selection.width);
                $('#h').val(selection.height);    
            }
            
            function generate_selection(){
                $('#crop_photo').imgAreaSelect({
                    /*x1: 10,
                    x2: 110,
                    y1: 10,
                    y2: 110,*/
                    aspectRatio: '1:1',
                    handles: true,
                    fadeSpeed: 200,
                    onInit: preview,
                    onSelectChange: preview
                });
            }
            
            /*
            fungsi untuk save dan cancel
            image profile pic kita
            */
            function action_pic(action){
                pic = $('.frame').find('img').attr('alt');
                x1 = $('#x1').val();
                y1 = $('#y1').val();
                w = $('#w').val();
                h = $('#h').val();
                //
                extra = (action == 'save')?x1+'/'+y1+'/'+w+'/'+h:'';
                url_page = base_url+'upload/action_pic/'+action+'/'+pic+'/'+extra;
                //
                loading('action_pic_loading',true);
                setTimeout(function(){
                    $.ajax({
                        type: 'GET',
                        url: url_page,
                        data: '', 
                        cache: false,
                        dataType: 'html',
                        success: function(html){
                            if(action == 'save'){
                                $('#action_pic_result').html(html);
								location.reload();
                            }
                            $('#crop_photo').imgAreaSelect({hide:true});
                            $('#box_shadowed_member_area').fadeOut(); 
                            loading('action_pic_loading',false);
                            //$('div.imgareaselect-outer').remove();
							
                        }
                    });
                }, 500);
            }
        </script>
	

</head>
<body>
<?=$body?>
    </body>
</html>