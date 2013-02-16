<?php


include_once '../data_base_access/trazimoDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
	if (isset ($_GET['id'])){
	
	$id = $_GET['id'];
	$stan = izbrisiTrazimo($id);
	
	header('Location: spisak_trazimo.php');
	} 
	
}    
