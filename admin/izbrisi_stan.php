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
	unlink("slike/" . $naziv);
        unlink("slike/thumb_" . $naziv);
        unlink("slike/watermark_" . $naziv);
	header('Location: spisak_stanova.php');
	} 
	
}    
