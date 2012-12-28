<?php
class Bojo extends CI_Model
	{
		function Bojo()
		{
			parent::__construct();
		//	$this->load->database('02', true);
		
		}
		
		function RaKuat()
		{
			$query	= $this->db->query("SELECT * FROM IO");
			return $query;
		}
	}
?>