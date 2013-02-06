<?php


include_once '../data_base_access/ponudeDA.php';
if($_SESSION['uloga'] != 1)
{
    header('Location: login.php');
}
else{
if (isset ($_POST['izmeni_ponudu'])){
	
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $vlasnik = isset($_POST['vlasnik']) ? $_POST['vlasnik'] : null;
        $ulica = isset($_POST['ulica']) ? $_POST['ulica'] : null;
        $br = isset($_POST['br']) ? $_POST['br'] : null;
        $telefon = isset($_POST['telefon']) ? $_POST['telefon'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $cena = isset($_POST['cena']) ? $_POST['cena'] : null;
        $kvadratura = isset($_POST['kvadratura']) ? $_POST['kvadratura'] : null;
        $opis = isset($_POST['opis']) ? $_POST['opis'] : null;

        $kablovska = isset($_POST['kablovska']) ? '1' : '0';
        $tv = isset($_POST['tv']) ? '1' : '0';
        $klima = isset($_POST['klima']) ? '1' : '0';
        $internet = isset($_POST['internet']) ? '1' : '0';
        $ima_telefon = isset($_POST['ima_telefon']) ? '1' : '0';
        $frizider = isset($_POST['frizider']) ? '1' : '0';
        $sporet = isset($_POST['sporet']) ? '1' : '0';
        $vesmasina = isset($_POST['vesmasina']) ? '1' : '0';
        $kuhinjskielementi = isset($_POST['kuhinjskielementi']) ? '1' : '0';
        $plakari = isset($_POST['plakari']) ? '1' : '0';
        $interfon = isset($_POST['interfon']) ? '1' : '0';
        $lift = isset($_POST['lift']) ? '1' : '0';
        $bazen = isset($_POST['bazen']) ? '1' : '0';
        $garaza = isset($_POST['garaza']) ? '1' : '0';
        $parking = isset($_POST['parking']) ? '1' : '0';
        $dvoriste = isset($_POST['dvoriste']) ? '1' : '0';
        $potkrovlje = isset($_POST['potkrovlje']) ? '1' : '0';
        $terasa = isset($_POST['terasa']) ? '1' : '0';
        $novogradnja = isset($_POST['novogradnja']) ? '1' : '0';
        $renovirano = isset($_POST['renovirano']) ? '1' : '0';
        $lux = isset($_POST['lux']) ? '1' : '0';
        $penthaus = isset($_POST['penthaus']) ? '1' : '0';
        $salonski = isset($_POST['salonski']) ? '1' : '0';
        $lodja = isset($_POST['lodja']) ? '1' : '0';

        
	izmeniPonudu($id, $vlasnik, $ulica, $br, $telefon, $email, $cena, $kvadratura, $opis, $kablovska, $tv, $klima, $internet, $ima_telefon, $frizider, $sporet, $vesmasina, $kuhinjskielementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja);
	}
	header("Location: izmeni_ponudu.php?id=$id");
	 
	
}    
