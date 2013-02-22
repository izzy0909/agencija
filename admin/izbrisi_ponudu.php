<?php


include_once '../data_base_access/ponudeDA.php';
include_once '../data_base_access/slikeDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
	if (isset ($_GET['id'])){
	
	$id = $_GET['id'];
        $slike = pokupiSlikePonudaZaBrisanje($id);
        foreach($slike as $slika){

            unlink("slike/" . $slika['naziv']);
        }
	$stan = izbrisiPonudu($id);
	
	header('Location: spisak_ponuda.php');
	} 
	
}    
