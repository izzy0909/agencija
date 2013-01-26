<?php

include_once '../data_base_access/stanoviDA.php';
	
	
	$id = isset($_GET['id']) ? $_GET['id'] : null;
	$vidljiv = isset($_GET['vidljiv']) ? $_GET['vidljiv'] : null;
    
    
    var_dump($id, $vidljiv);
	
	if($vidljiv == '1'){
    promeniVidljivostStana($id, '0');
	}
	else{
	promeniVidljivostStana($id, '1');
	}

	header("Location:".$_SERVER['HTTP_REFERER']);
