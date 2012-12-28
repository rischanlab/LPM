<?php 
	
	if(count($query->result())>0){
		foreach($query->result() as $nl)
		{
			echo"ID = ".$nl->ID."<br />NAMA = ".$nl->NAMA."<br />BOJO = ".$nl->BOJO;
		}
}
?>