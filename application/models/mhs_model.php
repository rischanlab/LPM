<?php

class Mhs_model extends CI_Model {

    function Mhs_model() {
		
        parent::__construct();
		
    }

	
	function Ketagihan()
		{
			$query	= $this->db->query("SELECT * FROM IO");
			return $query;
		}
	
   

}
