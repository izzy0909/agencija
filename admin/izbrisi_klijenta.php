<?php


include_once '../data_base_access/klijentiDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
	if (isset ($_GET['id'])){
	
	$id = $_GET['id'];
	izbrisiKlijenta($id);
	
	header('Location: spisak_klijenti.php');
	} 
	
}    
