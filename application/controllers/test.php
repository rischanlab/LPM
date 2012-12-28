<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {



function __construct()
	{
		parent::__construct();
		$this->load->library(array('Pagination','form_validation','session','image_lib','FPDF'));
		$this->load->helper(array('form','url', 'text_helper','date','file','csv'));
		$this->load->database();
		$this->load->model('angkatan_model');
		
		session_start();
	}


function tambah_peserta_perkelompok(){

		$data['kelompok']=$this->angkatan_model->nama_kelompok();

		$this->load->view('admin/tambahpeserta', $data);

}

function data_peserta_perkelompok($id_kelompok=''){
		$id_kelompok = $_POST['kelompok'];
		$data['kelompok']=$this->angkatan_model->nama_kelompok();
		$data1['isi']=$this->angkatan_model->get_peserta_kkn_perkelompok($id_kelompok);
		$this->load->view('admin/tambahpeserta', $data);
		$this->load->view('admin/datakelompok', $data1);
		


}






}