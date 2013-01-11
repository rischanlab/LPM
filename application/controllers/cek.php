<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cek extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library();
		session_start();
	}
	
	function index(){
	
			echo "<meta http-equiv='refresh' content='0; url=http://sia.uin-suka.ac.id/st'>";

	}
	
	
	
	function home($nim)
	
	{	
		
	
	
		

		$this->load->model('Mahasiswa_model');
		$this->load->model('Dosen_model');
		$hasil = $this->Mahasiswa_model->Portal_Login($nim);
		if (count($hasil->result_array())>0){
			foreach($hasil->result() as $data){
				if ($data->ID_AKSES == 1)
				{
				$hasil_login = $this->Mahasiswa_model->Data_Login($nim);
					foreach($hasil_login->result() as $items)
					{
						$session_username				= $items->NIM.'|'.$items->NAMA.'|'.$items->ID_USER.'|'.$items->PROFILE.'|'.$items->EMAIL.'|'.$items->LAST_ACCESS.'|'.$items->ID_AKSES;
						$tanda							= $items->ID_AKSES;
						$_SESSION['mhs']			= $session_username;
					}
				}
				
				if ($data->ID_AKSES == 2)
				{
				$hasil_login = $this->Dosen_model->Data_Login($username,$pwd);
					foreach($hasil_login->result() as $items)
					{
						$username_dosen					= $items->KD_DOSEN.'|'.$items->NM_DOSEN.'|'.$items->ID_USER.'|'.$items->PROFILE.'|'.$items->EMAIL.'|'.$items->LAST_ACCESS.'|'.$items->ID_AKSES;
						$tanda							= $items->ID_AKSES;
						$_SESSION['dosen']			= $username_dosen;
					}
				}
			}
			
			
			if($tanda==1)
			{
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/form'>";
			}
			if($tanda==2)
			{
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/dosen'>";
			}
		}
		else{
			echo "<meta http-equiv='refresh' content='0; url=http://sia.uin-suka.ac.id/st'>";

		}
	}
	
	
	
}