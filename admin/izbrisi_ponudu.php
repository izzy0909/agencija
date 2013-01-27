<?php


include_once '../data_base_access/ponudeDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
	if (isset ($_GET['id'])){
	
	$id = $_GET['id'];
	$stan = izbrisiPonudu($id);
	
	header('Location: spisak_ponuda.php');
	} 
	
}    
