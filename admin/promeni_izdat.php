<?php

include_once '../data_base_access/stanoviDA.php';
	
	
	$id = isset($_GET['id']) ? $_GET['id'] : null;
	$izdat = isset($_GET['izdat']) ? $_GET['izdat'] : null;
    
    
    
	
	if($izdat == '1'){
            promeniDostupnostStana($id, '0');
	}
	else{
            promeniDostupnostStana($id, '1');
	}

	header("Location:spisak_stanova.php");
