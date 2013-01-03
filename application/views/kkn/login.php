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
<body>
<div id="header">
	<div class="inHeaderLogin"></div>
</div>



	

				<?php
				$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
				if($session!=""){
					$pecah=explode("|",$session);
					$status = $data["STATUS"] = $pecah[3];
				if($status=="Admin"){
						?>
				<center>
				<div class="headLoginForm">
							Administrator
					</div>
				<div class="fieldLogin">
				<table style="border: 1pt ridge #DDDDDD;" bgcolor="#FFFFE0"
					class="widget" width="230">
					<tr bgcolor="#ECFFBD">
						<td colspan="3"><h2>
								<img src="<?php echo base_url(); ?>public/images/login-icon.png" />
								Selamat Datang
							</h2></td>
					</tr>
					<tr>
						<td align="center" colspan="3">Hai, <b><?php echo $nama; ?> </b>
						</td>
					</tr>
					<tr>
						<td width="5"></td>
						<td><img
							src="<?php echo base_url(); ?>public/images/user-icon.jpg"
							class="image" />
						
						<td width="175"><a href="<? echo base_url(); ?>manage/peserta_kkn_management"><div
									class="menu-user">Masuk ke Panel Admin</div> </a>  <a
							href="<? echo base_url(); ?>kkn/logout"><div class="menu-user">Keluar
									/ Log Out</div> </a>
						</td>
					</tr>
					<tr>
						<td colspan="3" height="10"></td>
					</tr>
				</table>
				<div>
				</center>
				<?php
					}
				}
				else {
					?>
							
							<div id="loginForm">
							<div class="headLoginForm">
							Login Administrator
							</div>
							<div class="fieldLogin">
							<form method="POST" action="<?php echo "".base_url()."kkn/login" ?>">
							<label>Username</label><br>
							<input type="text" class="login" name="usernameteks"><br>
							<label>Password</label><br>
							<input type="password" class="login" name="passwordteks"><br>
							<input type="submit" class="button" value="Login">
							</form>
							</div>
							</div>
				<?php
				}
				
			
				?>
		</div>
	</div>
	