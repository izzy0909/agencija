<?php

include_once '../data_base_access/stanoviDA.php';
include_once '../data_base_access/dodatniTagoviDA.php';
	
	
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $vlasnik = isset($_POST['vlasnik']) ? $_POST['vlasnik'] : null;
    $telefon = isset($_POST['telefon']) ? $_POST['telefon'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $kategorija = isset($_POST['kategorija']) ? $_POST['kategorija'] : null;
    $tip = isset($_POST['tip']) ? $_POST['tip'] : null;
    $stan_tip = isset($_POST['stan_tip']) ? $_POST['stan_tip'] : null;
    $ulica = isset($_POST['ulica']) ? $_POST['ulica'] : null;
    $br = isset($_POST['br']) ? $_POST['br'] : null;
    $sprat = isset($_POST['sprat']) ? $_POST['sprat'] : null;
    $opstina = isset($_POST['opstina']) ? $_POST['opstina'] : null;
    $grejanje = isset($_POST['grejanje']) ? $_POST['grejanje'] : null;
    $namestenost = isset($_POST['namestenost']) ? $_POST['namestenost'] : null;
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
    $vesmasina = isset($_POST['ves_masina']) ? '1' : '0';
    $kuhinjskielementi = isset($_POST['kuhinjski_elementi']) ? '1' : '0';
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
    
	//echo $adresa . '///' . $sprat . '///' . $opstina . '///' . $telefon . '///' . $cena . '///' . $kvadratura . '///' . $opis;
    izmeniStan($id, $vlasnik, $telefon, $email, $kategorija, $tip, $stan_tip, $ulica, $br, $sprat, $opstina, $grejanje, $namestenost, $cena, $kvadratura, $opis);
    izmeniDodatneTagove($id, $kablovska, $tv, $klima, $internet, $ima_telefon, $frizider, $sporet, $vesmasina, $kuhinjskielementi, $plakari, $interfon, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja);
    
	
    //dodajDodatneTagove($stan_id, $grejanje, $kablovska, $tv, $klima, $internet, $ima_telefon);
    
    //var_dump($stan_id, $grejanje, $kablovska, $tv, $klima, $internet, $ima_telefon);
    //echo $adresa . '///' . $sprat . '///' . $opstina . '///' . $telefon . '///' . $cena . '///' . $kvadratura . '///' . $opis;

	
	//upload($_FILES, $stan_id);

	header("Location: izmeni.php?id=$id");
