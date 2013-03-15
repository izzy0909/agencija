<?php


include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/slikeDA.php';

$username = $_SESSION['username'];
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
elseif($username == 'ivana' || $username == 'Nikola'){
	if (isset ($_GET['id'])){
	
	$id = $_GET['id'];
        $ponuda = prikaziStanZaAdmina($id);
        dodajIzbrisaniStan($ponuda['kategorija'], $ponuda['tip'], $ponuda['stan_tip'], $ponuda['vlasnik'], $ponuda['lokacija_id'], $ponuda['ulica'],$ponuda['br'], $ponuda['sprat'], $ponuda['telefon'], $ponuda['email'], $ponuda['cena'], $ponuda['kvadratura'], $ponuda['grejanje'], $ponuda['namestenost'], $ponuda['opis'], $ponuda['dodao'], $_SESSION['username']);
        $slike = pokupiSlikeZaBrisanje($id);
        foreach($slike as $slika){
            
            unlink("slike/" . $slika['naziv']);
        }
	$stan = izbrisiStan($id);
        
	header('Location: spisak_stanova.php');
	} 
	
}
else{
    header('Location: spisak_stanova.php');
}
