<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('Pagination','form_validation','session','image_lib','FPDF'));
		$this->load->helper(array('form','url', 'text_helper','date','file','csv'));
		$this->load->database();
		$this->load->model('admin_model');

		session_start();
	}
	
	
	function cobajson($nim) {
		$this->db = $this->load->database('saintek', TRUE);
		$this->load->model('admin_model');
		$tampungan= $this->admin_model->getMhsJson($nim);
		echo json_encode($tampungan);
		
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
				$this->load->view('admin/bg_menu');
				$this->load->view('admin/isi_index',$data);
				$this->load->view('admin/bg_bawah');
			}
			else{
				?>
<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
		else{
			?>
<script type="text/javascript" language="javascript">
		alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
		</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
		}
	}


	function export(){
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){

				$this->load->model('Admin_model','',TRUE);
					
					
				$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
				$time = time();

				$this->load->view('admin/bg_head',$data);
				$data1['cd'] = '';
				$data1['option_ta'] = $this->admin_model->getTaList();
				$this->load->view('admin/export', $data1);
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


	function export_do(){
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
					

				$id_kelompok=$this->input->post('id_kelompok');
				if ($id_kelompok==''){
					?>
<script>alert("Anda Belum memilih Kelompok...!!!");</script>

<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/export'>";
				}
				else {
						
					$this->load->model('Admin_model','',TRUE);
					$query=$this->Admin_model->get_kartu_anggota($id_kelompok);
						
					$data_isi = array('query' => $query);
						
					$info['kelompok'] = $this->Admin_model->get_infokelompok($id_kelompok);
					$q=$this->Admin_model->get_infokelompok($id_kelompok);
					$info= array('q' => $q);
					$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
					$time = time();

					$this->load->view('admin/lihatanggota',$data_isi);

				}


			}
		}


	}




	function pesertaperperiode(){
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				$ta=$this->input->post('id_ta');
				$periode=$this->input->post('id_periode');
				$angkatan=$this->input->post('id_angkatan');
				if (($ta==='') ||($periode==='')||($angkatan==='')){
					?>
<script>alert("Anda Isian yang belum anda pilih (TA/Periode/Angkatan), silahkan ulangi...!!!");</script>

<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/download_peserta'>";
				}
				else {
						
					$this->form_validation->set_rules('id_angkatan', 'Angkatan', 'trim|is_natural_no_zero|xss_clean');
					$this->form_validation->set_rules('id_ta', 'Tahun Akademik', 'trim|required');
					$this->form_validation->set_rules('id_periode', 'Periode KKN', 'trim|required|xss_clean');
					if ($this->form_validation->run() == FALSE){
						?>
<script type="text/javascript">
									alert("Semua Field harus diisi..!!!");			
									</script>

<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/download_peserta'>";
					} else {
							
						$this->load->model('Admin_model','',TRUE);
						$query = $this->Admin_model->to_csv($ta,$periode,$angkatan);
						if (count($query->result_array())>0){
							$this->load->helper('xls');
							query_to_xls($query, TRUE, 'PESERTA_KKN_'.date('dMy').'.xls');

						}else {
							?>
<script type="text/javascript">
									alert("Data Kosong..!!!");			
									</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/download_peserta'>";



						}

					}

						
						
						
				}


			}
		}


	}



	function kartukkn(){

		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				$id_kelompok=$this->input->post('category');
				if ($id_kelompok===''){
					?>
<script>alert("Anda Belum memilih Kelompok...!!!");</script>

<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/export'>";
				}
				else {



					$this->load->model('Admin_model','',TRUE);
					$data['mahasiswa'] =$this->Admin_model->get_anggotakelompok($id_kelompok)->row();;

					$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
					$time = time();

					$this->load->view('admin/kartukkn',$data);

						
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



	function angkatan()
	{
		$data = array();
		$data["tanggal"] = date("d-m-Y");
		$this->load->view('admin/bg_atas',$data);
		$this->load->view('admin/menu_admin');
		$data['cd'] = '';
		$data['cd_row'] = $this->admin_model->read_data();
		$data['option_ta'] = $this->admin_model->getTaList();
		$data['ketupat'] = $this->admin_model->get_dropdown_dosen();
		$this->load->view('admin/angkatan_v', $data);
		//$datajoin['cd_row'] = $this->admin_model->get_join_data();

		$page = $this->uri->segment(3);
		$limit = 5;
		if (!$page):
		$offset=0;
		else :
		$offset = $page;
		endif;

		$datajoin["page"]			=$page;
		$tot_hal				=$this->admin_model->get_join_data();
		$config['base_url']			=base_url(). 'admin/angkatan';
		$config['total_rows']			=$tot_hal->num_rows();
		$config['per_page']			=$limit;
		$config['uri_segment']			=3;
		$config['first_link']			='Awal';
		$config['last_link']			='Akhir';
		$config['next_link']			='Selanjutnya';
		$config['prev_link']			='Sebelumnya';
		$this->pagination->initialize($config);
		$datajoin["paginator"]			=$this->pagination->create_links();
		$datajoin['cd_row']			=$this->admin_model->get_data_page($limit,$offset);


		$this->load->view('admin/show_angkatan_v', $datajoin);

	}




	function tambah_anggota_kelompok() //untuk menampilkan form awal yaitu form tambah data cd
	{
		$data['cd'] = '';
		$data['option_ta'] = $this->admin_model->getTaList();
		$this->load->view('admin/tambahanggota', $data);

	}


	function anggotaperkelompok(){
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["NIM"]=$pecah[0];
			$data["NAMA"]=$pecah[1];
			$data["STATUS"]=$pecah[3];

			if($data["STATUS"]=="Admin"){
				$ta=$this->input->post('id_ta');
				$angkatan=$this->input->post('id_angkatan');
				$id_kelompok=$this->input->post('id_kelompok');
				if (($ta==='') ||($id_kelompok==='')||($angkatan==='')){
					?>
<script>alert("Anda Isian yang belum anda pilih (TA/Angkatan/Kelompok), silahkan ulangi...!!!");</script>

<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/tambah_anggota_kelompok'>";
				}
				else {
						
					$this->form_validation->set_rules('id_angkatan', 'Angkatan', 'trim|is_natural_no_zero|xss_clean');
					$this->form_validation->set_rules('id_ta', 'Tahun Akademik', 'trim|required');
					$this->form_validation->set_rules('id_kelompok', 'Nama Kelompok KKN', 'trim|required|xss_clean');
					if ($this->form_validation->run() == FALSE){
						?>
<script type="text/javascript">
									alert("Semua Field harus diisi..!!!");			
									</script>

<?php
echo "<meta http-equiv='refresh' content='0; url=".base_url()."admin/tambah_anggota_kelompok'>";
					} else {
							
						$this->load->model('Admin_model','',TRUE);
						$data['cd'] = '';
						$data['cd_row'] = $this->admin_model->read_data_peserta();
						$data['isi'] =$this->Admin_model->nama_kelompok();
						$data['anggota'] = $this->admin_model->get_dropdown_anggota_kkn();
						$this->load->view('admin/tambah_anggota_perkelompok', $data);
						$datajoin['isi'] = $this->Admin_model->get_peserta_kkn_perkelompok($id_kelompok);
						$this->load->view('admin/anggota_perkelompok', $datajoin);

							
					}
						
				}


			}
		}


	}



	function select_periode(){
		if('IS_AJAX') {
			$data['option_periode'] = $this->admin_model->getPeriodeList();
			$this->load->view('admin/periode_v',$data);
		}

	}


	function select_angkatan(){
		if('IS_AJAX') {
			$data['option_angkatan'] = $this->admin_model->getAngkatanList();
			$this->load->view('admin/angkatanoption_v',$data);
		}
	}

	function select_kelompok(){
			
		if('IS_AJAX') {
			$data['option_kelompok_a'] = $this->admin_model->getKelompokList();
			$this->load->view('admin/kelompok_av',$data);
		}
	}

	function download_peserta(){

		$data['cd'] = '';
		$data['option_ta'] = $this->admin_model->getTaList();
		$datatgl = array();
		$datatgl["tanggal"] = date("d-m-Y");
		$this->load->view('admin/bg_atas', $datatgl);
		$this->load->view('admin/menu_admin');
		$this->load->view('admin/download_peserta', $data);


	}

	function edit() //untuk menampilkan form edit data cd
	{
		$id_angkatan = $this->input->post('id_angkatan');
		if (!empty($id_angkatan)) $kode = $id_angkatan;
		else $kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->admin_model->get_data($kode);
		if ($result == null) redirect('admin/angkatan');
		else $data['cd'] = $result;

		$page = $this->uri->segment(3);
		$limit = 50;
		if (!$page):
		$offset=0;
		else :
		$offset = $page;
		endif;

		$datajoin["page"]				=$page;
		$tot_hal						=$this->admin_model->get_join_data();
		$config['base_url']				=base_url(). 'admin/angkatan';
		$config['total_rows']			=$tot_hal->num_rows();
		$config['per_page']				=$limit;
		$config['uri_segment']			=3;
		$config['first_link']			='Awal';
		$config['last_link']			='Akhir';
		$config['next_link']			='Selanjutnya';
		$config['prev_link']			='Sebelumnya';
		$this->pagination->initialize($config);
		$datajoin["paginator"]			=$this->pagination->create_links();
		$datajoin['cd_row']				=$this->admin_model->get_data_page($limit,$offset);
		$data['cd_row'] = $this->admin_model->read_data();
		$data['option_ta'] = $this->admin_model->getTaList();
		$data['ketupat'] = $this->admin_model->get_dropdown_dosen();
		$this->load->view('admin/angkatan_v', $data);
		$datajoin['cd_row'] = $this->admin_model->get_join_data();
		$this->load->view('admin/show_angkatan_v', $datajoin);
	}

	function delete() //untuk menghapus data cd
	{
		$kode = $this->security->xss_clean($this->uri->segment(3));
		$result = $this->admin_model->get_data($kode);
		if ($result == null) {
			redirect('admin/angkatan');
		} else {
			$delete = $this->admin_model->delete_data($kode);

			redirect('admin/angkatan');
		}
	}

	function inputangkatan() //untuk menambah data cd
	{

		$this->form_validation->set_rules('id_angkatan', 'Identifier', 'trim|is_natural_no_zero|xss_clean');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id_ta', 'Tahun Akademik', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id_periode', 'Periode KKN', 'trim|required|xss_clean');
	//	$this->form_validation->set_rules('kd_dosen', 'Ketua Panitia', 'trim|required|xss_clean');
		$this->form_validation->set_rules('sk_sertifikat', 'SK Sertifikat', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE){
			$this->angkatan();
		} else {


			$data = array(
					'ANGKATAN' => $this->input->post('angkatan'),
					'ID_TA' => $this->input->post('id_ta'),
					'ID_PERIODE' => $this->input->post('id_periode'),
					//'KD_DOSEN' => $this->input->post('kd_dosen'),
					'SK_SERTIFIKAT' => $this->input->post('sk_sertifikat')
			);
			$create = $this->admin_model->create_data($data);
			//if ($create) $this->session->set_flashdata('message', 'Data created!');
			//else $this->session->set_flashdata('message', 'Failed to create data!');
			redirect('admin/angkatan');
		}


	}


	function inputanggotakelompok() //untuk menambah data cd
	{
		$this->form_validation->set_rules('no', 'Mahasiswa', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE){
			$this->tambah_anggota_kelompok();
		} else {


			$data = array(
					'ID_KELOMPOK' => $this->input->post('id_kelompok'),
					'NO' => $this->input->post('no')
						
			);
			$create = $this->admin_model->input_data_anggota_kkn($data);
			redirect('admin/anggotaperkelompok');
		}


	}

	function update() //untuk meng-update data cd
	{

		$this->form_validation->set_rules('id_angkatan', 'Identifier', 'trim|is_natural_no_zero|xss_clean');
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id_ta', 'Tahun Akademik', 'trim|required|xss_clean');
		$this->form_validation->set_rules('id_periode', 'Periode KKN', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('kd_dosen', 'Ketua Panitia', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE){
			$this->edit();
		} else {
			$id_angkatan = $this->input->post('id_angkatan');
			$data = array(
					'ANGKATAN' => $this->input->post('angkatan'),
					'ID_TA' => $this->input->post('id_ta'),
					'ID_PERIODE' => $this->input->post('id_periode')
			);
			$update = $this->admin_model->update_data($id_angkatan,$data);
			redirect('admin/angkatan');
		}
	}







}








?>
