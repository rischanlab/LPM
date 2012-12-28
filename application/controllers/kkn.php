<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kkn extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library();
		session_start();
	}

	function index()
	{
		$data=array();
		$this->load->model('Kkn_model');
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nim"]=$pecah[0];
			$data["nama"]=$pecah[1];
		}


		$this->load->view('Kkn/login',$data);
		$this->load->view('Kkn/bg_footer');
	}
	function login()
	{
		$username = $this->input->post('usernameteks');
		$pwd = $this->input->post('passwordteks');
		$this->load->model('Kkn_model');
		$hasil = $this->Kkn_model->Data_Login($username,$pwd);
		if (count($hasil->result_array())>0){
			foreach($hasil->result() as $items){
				$session_username=$items->USERNAME."|".$items->NAMA."|".$items->IDLINK."|".$items->STATUS;
				$tanda=$items->STATUS;
			}
			$_SESSION['username_belajar']=$session_username;
			if($tanda=="Mahasiswa"){
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
			}
			else if($tanda=="Admin"){
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."manage/peserta_kkn_management'>";
			}
			else {
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."dosen'>";
			}
		}
		else{
			?>
<script type="text/javascript">
			alert("Username atau Password Yang Anda Masukkan Salah..!!!");			
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
		}
	}
	function logout()
	{
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
	}

	function logout_mhs()
	{
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; url=http://sia.uin-suka.ac.id'>";
	}

	function logout_dosen()
	{
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; url=http://sia.uin-suka.ac.id'>";
	}
	
	function logout_admin()
	{
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
	}

	function detailberita()
	{

		$id_berita='';
		if ($this->uri->segment(3) === FALSE)
		{
			$id_berita='';
		}
		else
		{
			$id_berita = $this->uri->segment(3);
		}
		$data=array();
		$this->load->model('Kkn_model');
		$this->load->library('Pagination');
		$this->load->helper('captcha');
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nim"]=$pecah[0];
			$data["nama"]=$pecah[1];
		}


		$this->load->view('Kkn/bg_kiri',$data);

		$this->load->view('Kkn/bg_footer');
	}
	
	function updatepassword()
	{
		$username=$this->input->post('username');
		$psw=$this->input->post('pwd');
		$psw_lama=$this->input->post('pwd_lama');
		$this->load->model('Kkn_model');
		$hasil = $this->Kkn_model->Data_Login($username,$psw_lama);
		if(count($hasil->result()) <= 0)
		{
			?>
			<script type="text/javascript">
				alert('Password lama yang anda masukkan SALAH..!!!');
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/Kkn/passwordmhs'>";
		}
		else if($psw!="" AND $psw_lama!="")
		{
			$this->Kkn_model->Update_Password($username,$psw);
			echo "<font size='2' face='arial'>Sukses memperbarui password.<br> Password anda yang baru : <b>".$psw."</b><br>
			Dengan username : <b>".$username."</b>";
		}
		else
		{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/Kkn/passwordmhs'>";
		}
	}

}
?>