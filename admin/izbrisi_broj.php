<?php


include_once '../data_base_access/imenikDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
	if (isset ($_GET['id'])){
	
	$id = $_GET['id'];
	izbrisiBroj($id);
	
	header('Location: imenik.php');
	} 
	
} 

