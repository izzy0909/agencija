<?php


include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/slikeDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
	if (isset ($_GET['id'])){
	
	$id = $_GET['id'];
        $slike = pokupiSlikeZaBrisanje($id);
        foreach($slike as $slika){
            
            unlink("slike/" . $slika['naziv']);
        }
	$stan = izbrisiStan($id);
        
	header('Location: spisak_stanova.php');
	} 
	
}    
