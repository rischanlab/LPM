<?php
class Mhs extends CI_Controller {

	function Mhs()
	{
		parent::__construct();
		//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		session_start();
		$this->load->helper(array('form','url', 'text_helper','date'));
		//$this->load->database();
		$this->load->library(array('Pagination','image_lib'));
		//$this->load->model('Mhs_model');
		//$this->load->model('Dosen_model');
	}
	
	
	
	function bojo($nim){
			
			if($nim == '1'){
			//calling database parameter set 1
			$this->db = $this->load->database('kkn', TRUE);
			$this->load->model('Mhs_model');
				$data['query']	= $this->Mhs_model->Ketagihan();
				$this->load->view('mhs/Positif',$data);
			} else {
			//calling database parameter set 2
			$this->db = $this->load->database('saintek', TRUE);
			$this->load->model('Mhs_model');
				$data['query']	= $this->Mhs_model->Ketagihan();
				$this->load->view('mhs/Positif',$data);
			}
			
	}
	
	
	
	
}

?>
