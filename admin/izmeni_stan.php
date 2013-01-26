<?php

include_once '../data_base_access/stanoviDA.php';
	
	
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$vlasnik = isset($_POST['vlasnik']) ? $_POST['vlasnik'] : null;
    $adresa = isset($_POST['adresa']) ? $_POST['adresa'] : null;
    $sprat = isset($_POST['sprat']) ? $_POST['sprat'] : null;
    $opstina = isset($_POST['opstina']) ? $_POST['opstina'] : null;
    $telefon = isset($_POST['telefon']) ? $_POST['telefon'] : null;
    $cena = isset($_POST['cena']) ? $_POST['cena'] : null;
    $kvadratura = isset($_POST['kvadratura']) ? $_POST['kvadratura'] : null;
    $opis = isset($_POST['opis']) ? $_POST['opis'] : null;
    
    $grejanje = isset($_POST['grejanje']) ? '1' : '0';
    $kablovska = isset($_POST['kablovska']) ? '1' : '0';
    $tv = isset($_POST['tv']) ? '1' : '0';
    $klima = isset($_POST['klima']) ? '1' : '0';
    $internet = isset($_POST['internet']) ? '1' : '0';
    $ima_telefon = isset($_POST['ima_telefon']) ? '1' : '0';
	echo $adresa . '///' . $sprat . '///' . $opstina . '///' . $telefon . '///' . $cena . '///' . $kvadratura . '///' . $opis;
    izmeniStan($id, $vlasnik, $adresa, $telefon, $cena, $sprat, $kvadratura, $opis);
    
	
    //dodajDodatneTagove($stan_id, $grejanje, $kablovska, $tv, $klima, $internet, $ima_telefon);
    
    //var_dump($stan_id, $grejanje, $kablovska, $tv, $klima, $internet, $ima_telefon);
    //echo $adresa . '///' . $sprat . '///' . $opstina . '///' . $telefon . '///' . $cena . '///' . $kvadratura . '///' . $opis;

	
	//upload($_FILES, $stan_id);

	header("Location: izmeni.php?id=$id");
