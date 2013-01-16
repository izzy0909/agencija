<?php


include_once '../data_base_access/stanoviDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
	if (isset ($_GET['id'])){
	
	$id = $_GET['id'];
	$stan = izbrisiStan($id);
	
	header('Location: spisak_stanova.php');
	} 
	
}    
