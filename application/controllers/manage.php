<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation','grocery_CRUD'));
		session_start();
		
	}

	function _manage_output($output = null)
	{
		$data = array();
		$data["tanggal"] = date("d-m-Y");
		$this->load->view('admin/bg_atas', $data);
		$this->load->view('admin/manage.php',$output);
	}

	function index()

	{

		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];
			
			if($data["STATUS"]=="Admin"){
				$this->load->view('admin/bg_head',$data);
				$this->load->view('admin/isi_index',$data);
				$this->load->view('admin/bg_bawah');
			}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
	}
	

	function peserta_kkn_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				try{
					$crud = new grocery_CRUD();

					$crud->set_theme('datatables');
					$crud->where('SUDAH','2');
					$crud->set_table('KKN_MHS');
					$crud->set_language("indonesian");
					$crud->display_as('FAK','Fakultas')
					->display_as('NAMA','Nama')
					->display_as('JK','J.Kelamin')
					->display_as('GOL_DARAH','GD')
					->display_as('DESA_RUMAH','Asal')
					->display_as('NM_KEC_RUMAH','Kec Asal')
					->display_as('NM_KAB_RUMAH','Kab Asal')
					->display_as('NM_PROP_RUMAH','Prop Asal')
					->display_as('HP_MHS','Hp')
					->display_as('TELP_MHS','Telp Rumah')
					->display_as('ALAMAT_JOGJA','Alamat Jogja')
					->display_as('DESA_JOGJA','Desa')
					->display_as('NM_KEC_JOGJA','Kec')
					->display_as('NM_KAB_JOGJA','Kab')
					->display_as('PATH_SK_DOKTER','SK Dokter')
					->display_as('PATH_SK_GOLONGAN_DARAH','SK Darah');

					$crud->unset_edit_fields('SUDAH');
					$crud->unset_add();
					$crud->unset_edit();
					$crud->unset_delete();
					$crud->unset_add_fields('NO','SUDAH');
					$crud->set_subject('Peserta KKN');
					$crud->required_fields('ALAMAT_JOGJA');

					$crud->columns('NIM','NAMA','JK','GOL_DARAH','FAK','DESA_RUMAH','NM_KEC_RUMAH','NM_KAB_RUMAH','NM_PROP_RUMAH','HP_MHS','TELP_MHS','ALAMAT_JOGJA', 'PATH_SK_DOKTER', 'PATH_SK_GOLONGAN_DARAH');
					$crud->set_field_upload('PATH_SK_DOKTER','uploads/sk_sehat');
					$crud->set_field_upload('PATH_SK_GOLONGAN_DARAH','uploads/sk_gol_darah');
					$crud->set_field_upload('PATH_SK_CUTI','uploads/sk_cuti_kerja');
					$crud->set_field_upload('PATH_SK_TIDAK_HAMIL','uploads/sk_tidak_hamil');
					//$crud->edit_fields('NIM','KD_FAK','ALAMAT_JOGJA','PRESTASI','KD_KEC','KD_KAB');
						
					
					$output = $crud->render();
						
					$this->_manage_output($output);
						
				}catch(Exception $e){
					show_error($e->getMessage().' --- '.$e->getTraceAsString());
				}
				
					}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
		
		
	}
	
	
	function peserta_kkn_management_all()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				try{	$crud = new grocery_CRUD();
					$crud->set_language("indonesian");
					$crud->set_theme('datatables');
					$crud->set_table('KKN_DETAIL_KELOMPOK');
					$crud->set_relation('ID_KELOMPOK','KKN_KELOMPOK','Kelompok:{NAMA_KELOMPOK}, RW:{RW}, {DESA}');
					$crud->display_as('ID_KELOMPOK','Keterangan Kelompok');
						$crud->set_relation('NO','KKN_MHS','Nim :{NIM}, Nama: {NAMA}, {JK}, Golongan Darah: {GOL_DARAH}, Kawin: {STATUS_KAWIN}, Fakulatas: {FAK}, {PRODI}, Prestasi: {PRESTASI}, Transport: {TRANSPORTASI}, No HP: {HP_MHS}, Telp: {TELP_MHS}, Alamat Rumah Mahasiswa: {ALAMAT_RUMAH}, RT: {RT_RUMAH}, {DESA_RUMAH}, {NM_KEC_RUMAH}, {NM_KAB_RUMAH}, {NM_PROP_RUMAH}, Alamat Jogja Mahasiswa: {ALAMAT_JOGJA}, RT: {RT_JOGJA}, {DESA_JOGJA}, {NM_KEC_JOGJA}, {NM_KAB_JOGJA}',array('SUDAH' => '3'));
					$crud->display_as('NO','Data Peserta KKN');
						
					$crud->unset_edit();	
					$crud->unset_add();
					$crud->unset_delete();
				
					//$crud->display_as('NO','Mahasiswa | Jenis Kelamin | Fakultas | Transportasi');
					$crud->columns('ID_KELOMPOK','NO');
					
					
					
					$output = $crud->render();
						
					$this->_manage_output($output);
						
				}catch(Exception $e){
					show_error($e->getMessage().' --- '.$e->getTraceAsString());
				}
				
					}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
		
		
	}


	function kelompok_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
	
				$crud = new grocery_CRUD();
				$crud->set_language("indonesian");
				$crud->set_theme('datatables');
					
				$crud->set_table('KKN_KELOMPOK');
				$crud->set_relation('ID_DOSEN','KKN_DPL','{NM_DOSEN} | {ALMT_RUMAH}');
				$crud->display_as('ID_DOSEN','Nama DPL | Alamat Rumah');
					
				$crud->set_relation('ID_ANGKATAN','KKN_ANGKATAN','ANGKATAN');
				$crud->display_as('ID_ANGKATAN','Angkatan KKN');
					
				$crud->set_relation('KD_KEC','MD_KEC','NM_KEC');
				$crud->display_as('KD_KEC','Kec');
					
				$crud->set_relation('KD_KAB','MD_KAB','NM_KAB');
				$crud->display_as('KD_KAB','Kab');
					
				$crud->set_relation('KD_PROP','MD_PROP','NM_PROP');
				$crud->display_as('KD_PROP','Prop');
				$crud->display_as('NAMA_KELOMPOK','Nama Kelompok (diawali dengan Angkatan KKN)')
				->display_as('RW','Lokasi.RW')
				->display_as('DESA','Lokasi.Desa');
					
				$crud->columns('NAMA_KELOMPOK','ID_ANGKATAN','ID_DOSEN','RW','DESA','KD_KEC','KD_KAB','KD_PROP');
				$crud->add_fields('NAMA_KELOMPOK','ID_ANGKATAN','ID_DOSEN','RW','DESA','KD_KEC','KD_KAB','KD_PROP');
				$crud->edit_fields('NAMA_KELOMPOK','ID_ANGKATAN','D_DOSEN','RW','DESA','KD_KEC','KD_KAB','KD_PROP');
				$crud->required_fields('NAMA_KELOMPOK','ID_ANGKATAN','ID_DOSEN','RW','DESA','KD_KEC','KD_KAB','KD_PROP');
				$crud->set_subject('Kelompok KKN');
					
				$output = $crud->render();

				$this->_manage_output($output);
				
				}
				else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
	}

	
	function detail_kelompok_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				
				$crud = new grocery_CRUD();
				$crud->set_language("indonesian");
				$crud->set_theme('datatables');
				$crud->set_table('KKN_DETAIL_KELOMPOK');
				$crud->set_relation('ID_KELOMPOK','KKN_KELOMPOK','{NAMA_KELOMPOK}, RW{RW},{DESA}');
				$crud->display_as('ID_KELOMPOK','Nama Kelompok');
					
				$crud->unset_edit();	
				$crud->add_fields('ID_KELOMPOK','NO');
				$crud->edit_fields('ID_KELOMPOK','NO');
				$crud->set_relation('NO','KKN_MHS','Nim: {NIM} , Jenis Kelamin: {JK}, Fakultas: {FAK}, Transportasi: {TRANSPORTASI}',array('SUDAH' => '2'));
				// $crud->set_relation('user_id','users','username',array('status' => 'active'));
				$crud->display_as('NO','Mahasiswa | Jenis Kelamin | Fakultas | Transportasi');
				$crud->columns('ID_KELOMPOK','NO');
				$crud->required_fields('ID_KELOMPOK','NO');
				$crud->callback_after_insert(array($this, 'set_sudah_jadi_tiga'));
				$crud->callback_after_delete(array($this, 'set_sudah_jadi_dua'));
					
				$output = $crud->render();

				$this->_manage_output($output);
				}
				else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
	}
	
	function set_sudah_jadi_tiga($post_array){
		$nim=$post_array['NO'];
		$query = $this->db->query("UPDATE KKN_MHS SET SUDAH='3' WHERE NO='$nim'");
		return $query;
	}
	
	function set_sudah_jadi_dua($primary_key){
		
		$query = $this->db->query("UPDATE KKN_MHS SET SUDAH='2' WHERE NO=(SELECT NO FROM KKN_DETAIL_KELOMPOK WHERE ID_DETAIL_KELOMPOK='$primary_key')");
		return $query;
	}
	
	function example_callback_after_upload($uploader_response,$field_info, $files_to_upload)
	{
	    $this->load->library('image_moo');
	 
	    //Is only one file uploaded so it ok to use it with $uploader_response[0].
	    $file_uploaded = $field_info->upload_path.'/'.$uploader_response[0]->name; 
	 
	    $this->image_moo->load($file_uploaded)->resize(100,64)->save($file_uploaded,true);
	 
	    return true;
	}

	function dosen_kkn_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
		
				$crud = new grocery_CRUD();
				$crud->set_language("indonesian");
				$crud->set_theme('datatables');
				$crud->set_table('KKN_DPL');
				$crud->display_as('KD_DOSEN','Kode Dosen')
					->display_as('NM_DOSEN','Nama')
					->display_as('NIP','Nip')
					->display_as('ALMT_RUMAH','Alamat')
					->display_as('RT','RT')
					->display_as('DESA','Desa')
					->display_as('KD_KAB','Kab')
					->display_as('KD_PROP','Prop')
					->display_as('TELP_RUMAH','Telp')
					->display_as('PATH_TTD','TTD Dosen')
					->display_as('MOBILE','Hp');
					
				$crud->set_relation('KD_KEC','MD_KEC','NM_KEC');
				$crud->display_as('KD_KEC','Kec');
					
				$crud->set_relation('KD_KAB','MD_KAB','NM_KAB');
				$crud->display_as('KD_KAB','Kab');
					
				$crud->set_relation('KD_PROP','MD_PROP','NM_PROP');
				$crud->display_as('KD_PROP','Prop');
				
				$crud->add_fields('KD_DOSEN','NM_DOSEN','NIP','MOBILE','ALMT_RUMAH','RT','DESA','KD_PROP','KD_KAB','KD_KEC','TELP_RUMAH','PATH_TTD');
				$crud->edit_fields('KD_DOSEN','NM_DOSEN','NIP','MOBILE','ALMT_RUMAH','RT','DESA','KD_PROP','KD_KAB','KD_KEC','TELP_RUMAH','PATH_TTD');
				$crud->required_fields('KD_DOSEN','NM_DOSEN','NIP','MOBILE','ALMT_RUMAH','RT','DESA','KD_PROP','KD_KAB','KD_KEC','TELP_RUMAH','PATH_TTD');
				$crud->columns('KD_DOSEN','NM_DOSEN','NIP','MOBILE','ALMT_RUMAH','RT','DESA','KD_KAB','KD_PROP','PATH_TTD');
				$crud->set_field_upload('PATH_TTD','assets/uploads/files');
				$crud->callback_after_upload(array($this,'example_callback_after_upload'));
				$output = $crud->render();

				$this->_manage_output($output);
				}
				else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
	}
	
	

	function ta_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
		
				$crud = new grocery_CRUD();
				$crud->set_language("indonesian");
				$crud->set_theme('datatables');
				$crud->set_table('KKN_TA');
				$crud->add_fields('TA');
				$crud->edit_fields('TA');
				$crud->columns('TA');
				$crud->required_fields('TA');
				$output = $crud->render();

				$this->_manage_output($output);
				}
				else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
	}
	
 
	
	function periode_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
	
				$crud = new grocery_CRUD();
				$crud->set_language("indonesian");
				$crud->set_theme('datatables');
				$crud->set_table('KKN_PERIODE');
				$crud->set_relation('ID_TA','KKN_TA','TA');
				$crud->display_as('ID_TA','Pilih Tahun Akademik');
				$crud->required_fields('PERIODE','TANGGAL_MULAI','TANGGAL_SELESAI','ID_TA');
				
				$crud->field_type('PERIODE','set',array('I','II','III','IV'));
				$crud->display_as('PERIODE','Nama Periode')
				->display_as('TANGGAL_MULAI','Tanggal Mulai KKN')
				->display_as('TEMA_KKN','Tema KKN')
				->display_as('UPLOAD_BUKU','Buku Panduan KKN')
				->display_as('TANGGAL_SELESAI','Tanggal Selesai KKN');
				
					
				$crud->add_fields('PERIODE','TANGGAL_MULAI','TANGGAL_SELESAI','ID_TA','TEMA_KKN','UPLOAD_BUKU');
				$crud->edit_fields('PERIODE','TANGGAL_MULAI','TANGGAL_SELESAI','ID_TA','TEMA_KKN','UPLOAD_BUKU');
				$crud->columns('PERIODE','TANGGAL_MULAI','TANGGAL_SELESAI','ID_TA','TEMA_KKN','UPLOAD_BUKU');
				$crud->set_field_upload('UPLOAD_BUKU','assets/uploads/files');
				$output = $crud->render();
					

				$this->_manage_output($output);
				}
				else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
	}
/**
	function angkatan_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				
				$crud = new grocery_CRUD();
				$crud->set_language("indonesian");
				$crud->set_theme('datatables');
				$crud->set_table('KKN_ANGKATAN');
				$crud->set_relation('ID_TA','KKN_TA','TA');
				$crud->display_as('ID_TA','Tahun Akademik');
				$crud->set_relation('ID_PERIODE','KKN_PERIODE','{PERIODE} , {KD_PERIODE}');
				$crud->display_as('ID_PERIODE','Periode');
				$crud->set_relation('KD_DOSEN','D_DOSEN','{NM_DOSEN}');
				$crud->display_as('KD_DOSEN','Ketua Panitia');
				
				$crud->add_fields('ANGKATAN','ID_TA','ID_PERIODE','KD_DOSEN');
				$crud->edit_fields('ANGKATAN','ID_TA','ID_PERIODE','KD_DOSEN');
					
				$crud->columns('ANGKATAN','ID_TA','ID_PERIODE','KD_DOSEN');
				$crud->required_fields('ANGKATAN','ID_TA','ID_PERIODE','KD_DOSEN');
					
					
				$output = $crud->render();
				
				$this->_manage_output($output);
				
				}
				else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
	}

	**/
	
	function admin_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
		
				$crud = new grocery_CRUD();
				$crud->set_language("indonesian");
				$crud->set_theme('datatables');
				$crud->set_table('KKN_ADMIN');
				$crud->field_type('STATUS','set',array('Admin'));
				
				$crud->display_as('USERNAME','Username')
				->display_as('PSW','Password')
				->display_as('STATUS','Status')
				->display_as('NAMA','Nama Lengkap');
				$crud->add_fields('USERNAME','PSW','NAMA','STATUS');
				$crud->edit_fields('USERNAME','PSW','NAMA','STATUS');
				$crud->columns('USERNAME','PSW','NAMA','STATUS');
				$output = $crud->render();
		
				$this->_manage_output($output);
				}
				else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
	}
	
 
	function matakuliah()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
		
				$crud = new grocery_CRUD();
				$crud->set_language("indonesian");
				$crud->set_theme('datatables');
				$crud->set_table('KKN_MATAKULIAH');
				$crud->set_relation('ID_FAK','KKN_FAK','NM_FAK');
				$crud->display_as('ID_FAK','Fakultas');
				$crud->display_as('KD_MK','Kode Matakuliah KKN');
			
				$crud->add_fields('KD_MK','ID_FAK');
				$crud->edit_fields('KD_MK','ID_FAK');
				$crud->columns('KD_MK','ID_FAK');
			
				$output = $crud->render();
		
				$this->_manage_output($output);
				}
				else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
	}
	
 
	
	
	function angkatan_management()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				  $this->load->model('Manage_model','',TRUE);
				  $data['query'] = $this->Manage_model->getAll();
				  $this->load->view('admin/show',$data);
				  $data_input['option_ta'] = $this->Manage_model->getTaList();
				  $this->load->view('admin/input',$data_input);
				  $data_dpl['dpl'] = $this->Manage_model->get_dropdown_dosen();
				  $this->load->view('admin/input_dpl',$data_dpl);
				
				}
				else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
			}
		}
		
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."kkn'>";
		}
	}
	
	function select_periode(){
			$this->load->model('Manage_model','',TRUE);
            if('IS_AJAX') {
        	$data['option_periode'] = $this->Manage_model->getPeriodeList();		
			$this->load->view('admin/periodechan',$data);
            }
		
	}
	
	
	 function submit(){
    if ($this->input->post('ajax')){
      if ($this->input->post('id')){
      	$this->MDaily->update();
      	$data['query'] = $this->MDaily->getAll();
      	$this->load->view('daily/show',$data);
      }else{
      	$this->MDaily->save();
      	$data['query'] = $this->MDaily->getAll();
      	$this->load->view('daily/show',$data);
      }

    }else{
      if ($this->input->post('submit')){
          if ($this->input->post('id')){
            $this->MDaily->update();
            redirect('daily/index');
          }else{
            $this->MDaily->save();
            redirect('daily/index');
          }
      }
    }
  }


	
 





}