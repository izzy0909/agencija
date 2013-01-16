<?php


include_once '../data_base_access/podsetnikDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
	if (isset ($_GET['id'])){
	
	$id = $_GET['id'];
	$stan = izbrisiPodsetnik($id);
	
	header('Location: podsetnik.php');
	} 
	
}    
