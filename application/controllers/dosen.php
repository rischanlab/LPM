<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation','session','image_lib'));
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		session_start();
	}

	function index()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['data']['status']) ? $_SESSION['data']['status']:'';
		if($session!=""){

			$kd_kelas2=$_SESSION['data']['kd_kelas'];
			$nm_kelas2=$_SESSION['data']['nm_kelas'];
			$kd_ta2 =$_SESSION['data']['kd_ta'];
			$kd_smt2 =$_SESSION['data']['kd_smt'];
			$id_user2 =$_SESSION['data']['id_user'];
			$nm_user2 =$_SESSION['data']['nm_user'];
			$kd_kur2 =$_SESSION['data']['kd_kur'];
			$kd_prodi2 =$_SESSION['data']['kd_prodi'];
			$nm_prodi2 =$_SESSION['data']['nm_prodi'];
			$kd_mk2 =$_SESSION['data']['kd_mk'];
			$sks_mk2 =$_SESSION['data']['sks_mk'];
			$status2 =$_SESSION['data']['status'];


			$data["nim"]=$id_user2;
			$data["nama"]=$nm_user2;
			$data["status"]=$status2;
			 
			if($status2='2'){
				$data["tanggal"] = mdate($datestring, $time);
				$this->load->view('dosen/bg_atas',$data);
				$this->load->view('dosen/bg_menu');
				$this->load->view('dosen/isi_index',$data);
				$this->load->view('dosen/bg_bawah');
			}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
<script type="text/javascript">
			alert("Anda Harus Login Melalui SIA..!!!");	
			window.location = "http://sia.uin-suka.ac.id/"
			</script>
<?php

		}
	}



	function lihatkelompok(){

		$session=isset($_SESSION['data']['status']) ? $_SESSION['data']['status']:'';
		if($session!=""){

			$kd_kelas2=$_SESSION['data']['kd_kelas'];
			$nm_kelas2=$_SESSION['data']['nm_kelas'];
			$kd_ta2 =$_SESSION['data']['kd_ta'];
			$kd_smt2 =$_SESSION['data']['kd_smt'];
			$id_user2 =$_SESSION['data']['id_user'];
			$nm_user2 =$_SESSION['data']['nm_user'];
			$kd_kur2 =$_SESSION['data']['kd_kur'];
			$kd_prodi2 =$_SESSION['data']['kd_prodi'];
			$nm_prodi2 =$_SESSION['data']['nm_prodi'];
			$kd_mk2 =$_SESSION['data']['kd_mk'];
			$sks_mk2 =$_SESSION['data']['sks_mk'];
			$status2 =$_SESSION['data']['status'];


			$data["nim"]=$id_user2;
			$data["nama"]=$nm_user2;
			$data["status"]=$status2;
			 
			if($status2='2'){
				$nim =$_SESSION['data']['id_user'];
				$nm_user2 =$_SESSION['data']['nm_user'];
				$this->load->model('Dosen_model','',TRUE);
				$hasil = $this->Dosen_model->cek_dosen_membina($nim);
				if (count($hasil->result_array())>0){
						
					
							//$category = $this->Dosen_model->get_dropdown();
								
							$data['title'] = 'Mahasiswa Detail';
							$data['link_back'] = anchor('mahasiswa/index/','Kembali Ke Beranda',array('class'=>'back'));

							// load view
							$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
							$time = time();
							$var = array();
							$var["nama"]=$nm_user2;
								
							$var["tanggal"] = mdate($datestring, $time);
								
								
							$category['category'] = $this->Dosen_model->get_dropdown($nim);
								
							$this->load->view('dosen/bg_atas',$var);
							$this->load->view('dosen/bg_menu');
							
							$this->load->model('admin_model');
							$data['cd'] = '';
							$data['option_ta'] = $this->admin_model->getTaList();
							$this->load->view('dosen/lihatpeserta', $data);
							$this->load->view('dosen/bg_bawah');
								
				
					}else {
									
									?>
				<script type="text/javascript">
							alert("LPM Belum Melakukan Pembagian Kelompok untuk Anda!!!");			
							</script>
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."/dosen/'>";
					
					}
				
				
				
				
				}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
<script type="text/javascript">
			alert("Anda Harus Login Melalui SIA..!!!");	
			window.location = "http://sia.uin-suka.ac.id/"
			</script>
<?php

		}
					



	}
	
	function select_kelompok(){
			$id_dosen	= $_SESSION['data']['id_user'];
            if('IS_AJAX') {
        	$data['option_kelompok'] = $this->admin_model->getKelompokList($id_dosen);		
			$this->load->view('admin/kelompok_v',$data);
            }
	}


	function lihatanggota(){

		$session=isset($_SESSION['data']['status']) ? $_SESSION['data']['status']:'';
		if($session!=""){

			$kd_kelas2=$_SESSION['data']['kd_kelas'];
			$nm_kelas2=$_SESSION['data']['nm_kelas'];
			$kd_ta2 =$_SESSION['data']['kd_ta'];
			$kd_smt2 =$_SESSION['data']['kd_smt'];
			$id_user2 =$_SESSION['data']['id_user'];
			$nm_user2 =$_SESSION['data']['nm_user'];
			$kd_kur2 =$_SESSION['data']['kd_kur'];
			$kd_prodi2 =$_SESSION['data']['kd_prodi'];
			$nm_prodi2 =$_SESSION['data']['nm_prodi'];
			$kd_mk2 =$_SESSION['data']['kd_mk'];
			$sks_mk2 =$_SESSION['data']['sks_mk'];
			$status2 =$_SESSION['data']['status'];


			$data["nim"]=$id_user2;
			$data["nama"]=$nm_user2;
			$data["status"]=$status2;
			 
			if($status2='2'){
				$nim =$_SESSION['data']['id_user'];
				$nm_user2 =$_SESSION['data']['nm_user'];
				$id_kelompok=$this->input->post('id_kelompok');
				
				
				if ($id_kelompok==''){
				?>
				<script>alert("Anda Belum memilih Kelompok...!!!");</script>
				
				<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."dosen/lihatkelompok'>";
				}
					else {
				
				
				
							$this->load->model('Dosen_model','',TRUE);
								
							$query=$this->Dosen_model->get_anggotakelompok($id_kelompok);
								
							$data_isi = array('query' => $query);
								
							$info['kelompok'] = $this->Dosen_model->get_infokelompok($id_kelompok);
							$q=$this->Dosen_model->get_infokelompok($id_kelompok);
							$info= array('q' => $q);

							$data['title'] = 'Mahasiswa Detail';
							$data['link_back'] = anchor('mahasiswa/index/','Kembali Ke Beranda',array('class'=>'back'));

							// load view
							$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
							$time = time();
							$var = array();
							$var["nama"]=$nm_user2;
								
							$var["tanggal"] = mdate($datestring, $time);
								
								
							$this->load->view('dosen/bg_atas',$var);
							$this->load->view('dosen/bg_menu');
							$this->load->view('dosen/lihatanggota',$data_isi);
							$this->load->view('dosen/infokelompok',$info);
							$this->load->view('dosen/bg_bawah');
						}
						
						}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Dosen...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
<script type="text/javascript">
			alert("Anda Harus Login Melalui SIA..!!!");	
			window.location = "http://sia.uin-suka.ac.id/"
			</script>
<?php

		}
						
	
	}




}








?>
