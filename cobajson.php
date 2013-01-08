<?php
$value = $_GET['q']; // Do your filtering here.
$results = array("Sumarsono","Agung Fatwanto","Agus Mulyanto","Fatma Amalia");

echo json_encode($results);
?>
