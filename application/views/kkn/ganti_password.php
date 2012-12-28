<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url(); ?>assets/mos-css/mos-style.css"
	rel="stylesheet" type="text/css" />

<link rel="shortcut icon"
	href="<?php echo base_url(); ?>public/images/icon.png" />
<title>Panel Admin | KKN LPM UIN Sunan Kalijaga Yogyakarta</title>
</head>
<center>
<div id="header">
	<div class="inHeaderLogin"></div>
</div>

<h2>Ganti Password " <?php echo $nama; ?> "</h2><br />

<form method="post" action="<? echo base_url(); ?>index.php/kkn/updatepassword">
<table cellspacing="5">
<tr><td width="150"><h3>Username</h3></td><td width="10">:</td><td><input type="text" name="username" readonly="readonly" value="<? echo $nim; ?>" class="textfield" size="30"></td></tr>
<tr><td width="150"><h3>Password Lama</h3></td><td width="10">:</td><td><input type="password" name="pwd_lama" class="textfield" size="30"></td></tr>
<tr><td width="150"><h3>Password Baru</h3></td><td width="10">:</td><td><input type="password" name="pwd" class="textfield" size="30"></td></tr>
<tr><td></td><td></td><td><input type="submit" value="Ganti Password" class="tombol"></td></tr>
</table></form>

</center>
