<?php

include_once '../data_base_access/stanoviDA.php';
	
	
	$id = isset($_GET['id']) ? $_GET['id'] : null;
	$vidljiv = isset($_GET['hot']) ? $_GET['hot'] : null;
    
    
    
	
	if($vidljiv == '1'){
            promeniHotStana($id, '0');
	}
	else{
            promeniHotStana($id, '1');
	}

	header("Location:spisak_stanova.php");
